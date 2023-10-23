<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proxy Browser</title>

    <style>
        .header {
            display: flex;
            justify-content: center;
        }

        .header > div {
            margin: 0 5px;
        }

        .btn {
            border: 1px solid #000;
            padding: 5px;
            height: 25px;
        }

        #browseInput {
            padding: 5px;
            height: 24px;
            width: 600px;
        }

        @media (max-width: 768px) {
            #browseInput {
                width: 300px;
            }
        }
        
        @media (max-width: 500px) {
            #browseInput {
                width: 200px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="btn">
            <svg fill="#000000" width="25" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                viewBox="0 0 476.213 476.213" xml:space="preserve">
                <polygon points="476.213,223.107 57.427,223.107 151.82,128.713 130.607,107.5 0,238.106 130.607,368.714 151.82,347.5 
                57.427,253.107 476.213,253.107 "/>
            </svg>
        </div>
        <div class="btn">
            <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 3V8M21 8H16M21 8L18 5.29168C16.4077 3.86656 14.3051 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.2832 21 19.8675 18.008 20.777 14" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div>
            <form id="browseForm" action="" method="post">
                <input id="browseInput" type="text" name="url" placeholder="Enter Url or Search with Google">
            </form>
        </div>
        <div class="btn" onclick="browseFormSubmitHandler();">
            <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.5003 12H5.41872M5.24634 12.7972L4.24158 15.7986C3.69128 17.4424 3.41613 18.2643 3.61359 18.7704C3.78506 19.21 4.15335 19.5432 4.6078 19.6701C5.13111 19.8161 5.92151 19.4604 7.50231 18.7491L17.6367 14.1886C19.1797 13.4942 19.9512 13.1471 20.1896 12.6648C20.3968 12.2458 20.3968 11.7541 20.1896 11.3351C19.9512 10.8529 19.1797 10.5057 17.6367 9.81135L7.48483 5.24303C5.90879 4.53382 5.12078 4.17921 4.59799 4.32468C4.14397 4.45101 3.77572 4.78336 3.60365 5.22209C3.40551 5.72728 3.67772 6.54741 4.22215 8.18767L5.24829 11.2793C5.34179 11.561 5.38855 11.7019 5.407 11.8459C5.42338 11.9738 5.42321 12.1032 5.40651 12.231C5.38768 12.375 5.34057 12.5157 5.24634 12.7972Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </header>
    <main>
        <iframe id="browseFrame" src="" frameborder="0" style="width: 100%; height: 600px;">

        </iframe>
    </main>

    <script>
        
        let browseForm = document.querySelector('#browseForm');
        let browseInput = document.querySelector('#browseInput');
        let browseFrame =  document.querySelector('#browseFrame');

        function getBrowsableUrl(url) {
            return 'browse.php?url=' + encodeURIComponent(url);
        }
        
        function browseFormSubmitHandler() {
            browseFrame.src = getBrowsableUrl(browseInput.value);
        }

        browseForm.addEventListener('submit', e => {
            e.preventDefault();
            browseFormSubmitHandler();
            return false;
        });

        browseFrame.addEventListener('change', e => {
            browseInput.value = browseFrame.src;
        });
    </script>
</body>
</html>