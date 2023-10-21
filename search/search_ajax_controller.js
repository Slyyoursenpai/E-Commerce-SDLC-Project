document.addEventListener("DOMContentLoaded", function () {
    const searchBox = document.querySelector("#search_box");
    const searchButton = document.querySelector("#search_btn");
    const resultsContainer = document.querySelector(".box-container");
  
    function performSearch() { /// live search function
      const searchTerm = searchBox.value.trim();
      if (searchTerm !== "") {
        const xhr = new XMLHttpRequest();
  
        xhr.open("POST", "search_handler_model.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            resultsContainer.innerHTML = xhr.responseText;
          }
        };
  
        xhr.send("search_box=" + searchTerm);
      } else {
        resultsContainer.innerHTML = "";
      }
    }
  
    searchBox.addEventListener("input", performSearch);
  
    searchButton.addEventListener("click", function (e) {
      e.preventDefault();
      performSearch(); /// button here as no real functionality can remove 
    });
  });
  