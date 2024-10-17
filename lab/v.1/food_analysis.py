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
    return jsonify(data)

if __name__ == '__main__':
    app.run(debug=True)
"""

    from pyscript import Element
    from pyodide.ffi import create_proxy
    import js

    def analyze_image(event):
        try:
            file_input = js.document.getElementById("fileInput")
            file = file_input.files.item(0)
        if not file:
            Element("result").write("No file selected.")
            return

        # Directly use the target URL without a proxy
        target_url = "https://vision.foodvisor.io/api/1.0/en/analysis/"
        url = target_url  # No proxy

        headers = js.Object.fromEntries([
            ["Authorization", "Api-Key UHf3xec1.UryRxsWwSERtdhsyv36pREQxHXXTJt7J"]
        ])

        def onload(event):
            try:
                image_data = event.target.result
                form_data = js.FormData.new()
                form_data.append("image", js.Blob.new([image_data], {"type": file.type}))
                js.fetch(url, {
                    "method": "POST",
                    "headers": headers,
                    "body": form_data
                }).then(lambda response: handle_response(response)).catch(create_proxy(handle_error))
            except Exception as e:
                Element("result").write(f"Error during file read: {e}")

        reader = js.FileReader.new()
        reader.onload = create_proxy(onload)
        reader.readAsArrayBuffer(file)
            except Exception as e:
        Element("result").write(f"Error during image analysis: {e}")


        reader = js.FileReader.new()
        reader.onload = create_proxy(onload)
        reader.readAsArrayBuffer(file)
        except Exception as e:
        Element("result").write(f"Error during image analysis: {e}")

        def handle_response(response):
            if not response.ok:
                response.text().then(lambda text: Element("result").write(f"Error: {text}"))
                return
            if response.headers.get("content-type") != "application/json":
                response.text().then(lambda text: Element("result").write(f"Unexpected response format: {text}"))
                return
            response.json().then(create_proxy(display_result)).catch(create_proxy(handle_error))

        def display_result(data):
            try:
                data_py = data.to_py()
                Element("result").write(f"API Response: {data_py}")  # Log the entire response for debugging
                items = data_py.get("items")
                if items and len(items) > 0:
                    Element("result").write(f"Items: {items}")  # Log the items for debugging
                    if items[0].get("food") and len(items[0]["food"]) > 0:
                        food_info = items[0]["food"][0]["food_info"]
                        nutrition = food_info["nutrition"]
                        formatted_data = f
                            Food ID: {food_info.get("food_id")}<br>
                            Display Name: {food_info.get("display_name")}<br>
                            Calories (per 100g): {nutrition.get("calories_100g")}<br>
                            Carbs (per 100g): {nutrition.get("carbs_100g")}<br>
                            Fat (per 100g): {nutrition.get("fat_100g")}<br>
                            Proteins (per 100g): {nutrition.get("proteins_100g")}<br>
                        
                    else:
                        formatted_data = "No food information found."
                else:
                    formatted_data = "No items found in the response."

                Element("result").write(formatted_data)
            except Exception as e:
                Element("result").write(f"Error displaying result: {e}")

        def handle_error(error):
            Element("result").write(f"Error during fetch: {error}")

        js.document.getElementById("uploadButton").addEventListener("click", create_proxy(analyze_image))
"""