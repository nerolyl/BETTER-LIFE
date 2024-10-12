from flask import Flask, request, render_template, jsonify
import requests

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index1.html')

@app.route('/upload', methods=['POST'])
def upload():
    url = "https://vision.foodvisor.io/api/1.0/en/analysis/"
    headers = {"Authorization": "Api-Key UHf3xec1.UryRxsWwSERtdhsyv36pREQxHXXTJt7J"}

    if 'image' not in request.files:
        return jsonify({"error": "No file part"}), 400

    image = request.files['image']
    if image.filename == '':
        return jsonify({"error": "No selected file"}), 400

    response = requests.post(url, headers=headers, files={"image": image.read()})
    try:
        response.raise_for_status()
    except requests.exceptions.HTTPError as e:
        error_message = f"HTTP error occurred: {e}"
        if response.status_code == 400:
            error_details = response.json()
            if error_details.get("code") == "not_enough_credits":
                error_message = "Error: Not enough credits to perform this action."
            elif error_details.get("code") == "not_supported_mime_type":
                error_message = "Error: Image should be jpg or png."
        return jsonify({"error": error_message, "content": response.content.decode()}), response.status_code

    data = response.json()
    # print("API Response:", data)  # Print the entire API response

    # Extract and format the required fields from the first item
    if data.get('items') and len(data['items']) > 0 and data['items'][0].get('food') and len(data['items'][0]['food']) > 0:
        food_info = data['items'][0]['food'][0]['food_info']
        nutrition = food_info['nutrition']
        formatted_data = {
            "food_id": food_info.get("food_id"),
            "display_name": food_info.get("display_name"),
            "calories_100g": nutrition.get("calories_100g"),
            "carbs_100g": nutrition.get("carbs_100g"),
            "fat_100g": nutrition.get("fat_100g"),
            "proteins_100g": nutrition.get("proteins_100g")
        }
    else:
        formatted_data = {
            "food_id": None,
            "display_name": None,
            "calories_100g": None,
            "carbs_100g": None,
            "fat_100g": None,
            "proteins_100g": None
        }

    # print("Formatted Data:", formatted_data)  # Print the formatted data

    return jsonify(formatted_data)  # Return the formatted data

if __name__ == '__main__':
    app.run(debug=True)