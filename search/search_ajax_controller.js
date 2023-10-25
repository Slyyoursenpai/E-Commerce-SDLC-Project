document.addEventListener("DOMContentLoaded", function () {
    
    // Get references ot HTML elements.
    const searchBox = document.querySelector("#search_box");
    const searchButton = document.querySelector("#search_btn");
    const resultsContainer = document.querySelector(".box-container");
  

  
    // Function to perform live search.
    function performSearch() {
       // Get the search term from the input element and trim any leading/trailing spaces.
      const searchTerm = searchBox.value.trim();

      if (searchTerm !== "") {
        // Create a new XMLHttpRequest object.        
        const xhr = new XMLHttpRequest();
  
        // Set up a POST request to "search_handler_model.php".
        xhr.open("POST", "search_handler_model.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
        // Define the response callback function.
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
        // Update the results container with the response text.           
            resultsContainer.innerHTML = xhr.responseText;
          }
        };
 
        // Send the search term in the request body.        
        xhr.send("search_box=" + searchTerm);
      } else {
        resultsContainer.innerHTML = "";
      }
    }

    // Add an input event listener to the search box to trigger live search.    
    searchBox.addEventListener("input", performSearch);
  
    // Add a click event listener to the search button (with preventDefault).    
    searchButton.addEventListener("click", function (e) {
      e.preventDefault();
      
      // Trigger the live search function.
      performSearch(); /// button here as no real functionality can remove 
    });
  });
  