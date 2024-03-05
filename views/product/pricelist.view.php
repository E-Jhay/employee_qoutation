<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Excel to JavaScript Array</title>
</head>
<body>
  <input type="file" id="excelFileInput" accept=".xlsx, .xls" />
  <button id="saveButton">Save Products</button>

  <div class="col-span-6 md:col-span-6">
    <label for="product_code">Product Code</label>
    <!-- <textarea class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" name="" id="" cols="30" rows="10"></textarea> -->
    <input type="text" name="product_code" id="product_code" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_code']) ? 'border-red-500' : '' ?>" value="<?= old('product_code') ?>" placeholder="" />
    
    <ul id="dropdownOptions" class="px-4 rounded h-auto max-h-48 overflow-y-scroll">
          <!-- Options will be dynamically added here -->
    </ul>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
  <!-- <script src="products.js"></script> -->
  <script>
    // document.addEventListener("DOMContentLoaded", async function () {
    //   try {
    //     const data = await getProductLists();
    //     console.log(data)
    //   } catch (error) {
    //     console.error(error);
    //   }
    // });

    const searchInput = document.getElementById("product_code");
    const dropdownOptions = document.getElementById("dropdownOptions");

    const getProductLists = async () => {
      try{
        const response = await fetch("/getProductLists")
        const data = await response.json()
        return data
      } catch(e) {
         console.error(e)
      }
    }

    // Event listener for input changes
    searchInput.addEventListener("input", async function () {
        const searchTerm = searchInput.value.toLowerCase();
        try {
          const data = await getProductLists();
          
          const filteredOptions = data.filter(option =>
              option.code.toLowerCase().includes(searchTerm)
          );

          // Update the dropdown with filtered options
          renderOptions(filteredOptions);
        } catch (error) {
          console.error(error);
        }
    });

    function renderOptions(options) {
        // Clear existing options
        dropdownOptions.innerHTML = "";

        // Render filtered options
        options.forEach(option => {
            const li = document.createElement("li");
            li.textContent = option.code;
            li.className = 'text-gray-900 text-lg cursor-pointer hover:text-blue-500'

            // Event listener for option click
            li.addEventListener("click", function () {
                searchInput.value = option.code;
                document.getElementById('product_description').value  = option.description;
                // Additional action when an option is selected

                // Close the dropdown
                dropdownOptions.style.display = "none";
            });

            dropdownOptions.appendChild(li);
        });

        // Show or hide the dropdown based on the number of filtered options
        dropdownOptions.style.display = options.length > 0 ? "block" : "none";
    }

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".searchable-dropdown")) {
            dropdownOptions.style.display = "none";
        }
    });

document.getElementById('excelFileInput').addEventListener('change', handleFile);

function handleFile(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(event) {
        const data = new Uint8Array(event.target.result);
        const workbook = XLSX.read(data, {type: 'array'});
        const sheet_name = workbook.SheetNames[0];
        const worksheet = workbook.Sheets[sheet_name];
        const jsonData = XLSX.utils.sheet_to_json(worksheet, {header: 1});

        const products = [];

        // Assuming first row is header
        const headers = jsonData[0];
        for (let i = 1; i < jsonData.length; i++) {
            const product = {};
            for (let j = 0; j < headers.length; j++) {
                product[headers[j]] = jsonData[i][j];
            }
            products.push(product);
        }

        console.log(products);

        // Save products to existing txt file
        saveProducts(products);
    };

    reader.onerror = function(event) {
        console.error("File could not be read! Code " + event.target.error.code);
    };

    reader.readAsArrayBuffer(file);
}

function saveProducts(products) {
    fetch('/saveProductLists', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(products)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        console.log('Products saved successfully.');
    })
    .catch(error => {
        console.error('There was a problem saving the products:', error);
    });
}

  </script>
</body>
</html>
