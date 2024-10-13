const express = require('express');
const multer = require('multer');
const axios = require('axios');
const path = require('path');

const app = express();
const upload = multer();

app.use(express.static(path.join(__dirname, 'public')));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index1.html'));
});

app.post('/upload', upload.single('image'), async (req, res) => {
    const url = "https://vision.foodvisor.io/api/1.0/en/analysis/";
    const headers = { "Authorization": "Api-Key UHf3xec1.UryRxsWwSERtdhsyv36pREQxHXXTJt7J" };

    if (!req.file) {
        return res.status(400).json({ error: "No file part" });
    }

    try {
        const response = await axios.post(url, req.file.buffer, { headers: { ...headers, 'Content-Type': 'multipart/form-data' } });
        const data = response.data;

        // Extract and format the required fields from the first item
        let formattedData;
        if (data.items && data.items.length > 0 && data.items[0].food && data.items[0].food.length > 0) {
            const foodInfo = data.items[0].food[0].food_info;
            const nutrition = foodInfo.nutrition;
            formattedData = {
                food_id: foodInfo.food_id,
                display_name: foodInfo.display_name,
                calories_100g: nutrition.calories_100g,
                carbs_100g: nutrition.carbs_100g,
                fat_100g: nutrition.fat_100g,
                proteins_100g: nutrition.proteins_100g
            };
        } else {
            formattedData = {
                food_id: null,
                display_name: null,
                calories_100g: null,
                carbs_100g: null,
                fat_100g: null,
                proteins_100g: null
            };
        }

        res.json(formattedData);
    } catch (error) {
        let errorMessage = `HTTP error occurred: ${error.message}`;
        if (error.response && error.response.status === 400) {
            const errorDetails = error.response.data;
            if (errorDetails.code === "not_enough_credits") {
                errorMessage = "Error: Not enough credits to perform this action.";
            } else if (errorDetails.code === "not_supported_mime_type") {
                errorMessage = "Error: Image should be jpg or png.";
            }
        }
        res.status(error.response ? error.response.status : 500).json({ error: errorMessage, content: error.response ? error.response.data : null });
    }
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});