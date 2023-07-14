<!DOCTYPE html>
<html>
<head>
    <style>
        /* Styling for the pop-up box */
        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Styling for the pop-up content */
        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        /* Styling for the close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        /* When the mouse hovers over the close button */
        .close:hover {
            color: black;
        }
    </style>
</head>
<body>
    <?php
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form data
        // ...

        // Display the pop-up box after form submission
        echo '<script>document.addEventListener("DOMContentLoaded", function() { openPopup(); });</script>';
    }
    ?>

    <!-- The pop-up box -->
    <div id="popupBox" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Hello, I'm a Pop-up Box!</h2>
            <p>This is a pop-up box displayed after form submission.</p>
        </div>
    </div>

    <script>
        // Function to open the pop-up box
        function openPopup() {
            document.getElementById('popupBox').style.display = 'block';
        }

        // Function to close the pop-up box
        function closePopup() {
            document.getElementById('popupBox').style.display = 'none';
        }
    </script>
</body>
</html>
