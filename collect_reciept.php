<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Extract Text from Image using Tesseract.js</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            background-color: #fff;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        input[type="file"] {
            display: none;
        }

        label {
            display: block;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        label:hover {
            background-color: #2980b9;
        }

        #image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        textarea {
            width: 100%;
            height: 200px;
            resize: vertical;
            margin-top: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 14px;
        }

        input[type="submit"] {
            display: block;
            margin: 10px auto;
            background-color: #27ae60;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #219d54;
        }
    </style>
</head>
<body>
    <h1>Extract Text from Image using Tesseract.js</h1>
    <form method="POST" action="paymentprocess.php" enctype="multipart/form-data">
        <label for="image-input">Select an Image</label>
        <input type="file" id="image-input" accept="image/*">
        <img id="image" src="" alt="Image">
        <textarea id="text" name="extractedText" placeholder="Extracted Text" readonly></textarea>
        <input type="submit" name="submit" value="Submit">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@2.1.4/dist/tesseract.min.js"></script>
    <script>
        const imageInput = document.getElementById('image-input');
        const image = document.getElementById('image');
        const text = document.getElementById('text');
        imageInput.addEventListener('change', () => {
            const file = imageInput.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                image.src = reader.result;
                Tesseract.recognize(image.src)
                    .then(({ data: { text: extractedText } }) => {
                        text.value = extractedText;
                    });
            };
        });
    </script>
</body>
</html>
