document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);
    console.log("Form data prepared:", formData);

    fetch('/upload', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log("Response received:", response);
        if (!response.ok) {
            return response.text().then(text => { throw new Error(text); });
        }
        return response.json();
    })
    .then(data => {
        console.log("Data received:", data);
        const outputDiv = document.getElementById('output');
        outputDiv.innerHTML = `
            <p><strong>Food ID:</strong> ${data.food_id}</p>
            <p><strong>Display Name:</strong> ${data.display_name}</p>
            <p><strong>Calories (per 100g):</strong> ${data.calories_100g}</p>
            <p><strong>Carbs (per 100g):</strong> ${data.carbs_100g}</p>
            <p><strong>Fat (per 100g):</strong> ${data.fat_100g}</p>
            <p><strong>Proteins (per 100g):</strong> ${data.proteins_100g}</p>
        `;
    })
    .catch(error => {
        console.error("Error occurred:", error);
        const outputDiv = document.getElementById('output');
        outputDiv.innerHTML = `Error: ${error.message}`;
    });
});