let current_page = 1;
let entries_per_page = 10;
let filtered_data = php_data;
let sort_order = { column: null, ascending: true };

function renderTable(data, page = 1, entries = 10) {
  const tableBody = document.getElementById("table-body");
  tableBody.innerHTML = "";

  const start = (page - 1) * entries;
  const end = start + entries;
  const paginatedItems = data.slice(start, end);

  for (const item of paginatedItems) {
    const rowClass = item.id % 2 !== 0 ? "odd-row" : "";
    const row = `
            <tr class="${rowClass}">
                <td><input type="checkbox" class="row-checkbox" data-id="${item.id}"></td>
                <td>${item.id}</td>
                <td>${item.name}</td>
                <td>${item.parentId}</td>
                <td>${item.parentName}</td>
                <td>${item.type}</td>
                <td>${item.edit}</td>
                <td>${item.delete}</td>
            </tr>
        `;
    tableBody.innerHTML += row;
  }

  renderPagination(data.length, entries, page);
}

function renderPagination(totalItems, entriesPerPage, currentPage) {
  const pagination = document.getElementById("pagination");
  pagination.innerHTML = "";

  const totalPages = Math.ceil(totalItems / entriesPerPage);

  const prevButton = document.createElement("li");
  prevButton.classList.add("page-item");
  prevButton.classList.toggle("disabled", currentPage === 1);
  prevButton.innerHTML = `<a class="page-link" href="#" tabindex="-1">Previous</a>`;
  prevButton.onclick = (e) => {
    e.preventDefault();
    if (currentPage > 1) {
      changePage(currentPage - 1);
    }
  };
  pagination.appendChild(prevButton);

  for (let i = 1; i <= totalPages; i++) {
    const pageItem = document.createElement("li");
    pageItem.classList.add("page-item");
    pageItem.classList.toggle("active", i === currentPage);
    pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
    pageItem.onclick = (e) => {
      e.preventDefault();
      changePage(i);
    };
    pagination.appendChild(pageItem);
  }

  const nextButton = document.createElement("li");
  nextButton.classList.add("page-item");
  nextButton.classList.toggle("disabled", currentPage === totalPages);
  nextButton.innerHTML = `<a class="page-link" href="#">Next</a>`;
  nextButton.onclick = (e) => {
    e.preventDefault();
    if (currentPage < totalPages) {
      changePage(currentPage + 1);
    }
  };
  pagination.appendChild(nextButton);
}

function sortTable(column) {
  if (sort_order.column === column) {
    sort_order.ascending = !sort_order.ascending;
  } else {
    sort_order.column = column;
    sort_order.ascending = true;
  }

  filtered_data.sort((a, b) => {
    if (a[column] < b[column]) return sort_order.ascending ? -1 : 1;
    if (a[column] > b[column]) return sort_order.ascending ? 1 : -1;
    return 0;
  });

  renderTable(filtered_data, current_page, entries_per_page);
}

function changePage(page) {
  current_page = page;
  renderTable(filtered_data, current_page, entries_per_page);
}

function changeEntries() {
  const entriesSelect = document.getElementById("entries-select");
  entries_per_page = parseInt(entriesSelect.value);
  current_page = 1; // Reset to first page
  renderTable(filtered_data, current_page, entries_per_page);
}

function searchTable() {
  const searchInput = document
    .getElementById("search-input")
    .value.toLowerCase();
  filtered_data = php_data.filter(
    (item) =>
      item.id.toString().toLowerCase().includes(searchInput) || // Category ID
      item.name.toLowerCase().includes(searchInput) || // Category Name
      item.parentId?.toString().toLowerCase().includes(searchInput) || // Parent ID
      item.parentName?.toLowerCase().includes(searchInput) || // Parent Name
      item.type.toLowerCase().includes(searchInput) // Category Type
  );
  current_page = 1; // Reset to first page
  renderTable(filtered_data, current_page, entries_per_page);
}

window.onload = () => {
  renderTable(filtered_data, current_page, entries_per_page);

  // Add checkbox handling logic
  document.addEventListener("change", (event) => {
    if (event.target.classList.contains("row-checkbox")) {
      handleSelectedRows();
    } else if (event.target.id === "select-all-checkbox") {
      toggleSelectAll(event.target.checked);
    }
  });
};

// Get IDs of selected rows
function getSelectedRowIds() {
  const checkboxes = document.querySelectorAll(".row-checkbox");
  const selectedIds = [];
  checkboxes.forEach((checkbox) => {
    if (checkbox.checked) {
      selectedIds.push(checkbox.getAttribute("data-id"));
    }
  });
  return selectedIds;
}

// Handle selection of individual row checkboxes
function handleSelectedRows() {
  const selectedIds = getSelectedRowIds();
  console.log("Selected Row IDs:", selectedIds);
  // Perform actions with selected IDs
}

// Select or deselect all row checkboxes based on the header checkbox state
function toggleSelectAll(isChecked) {
  const checkboxes = document.querySelectorAll(".row-checkbox");
  checkboxes.forEach((checkbox) => {
    checkbox.checked = isChecked;
  });
  handleSelectedRows();
}

// Delete selected rows from the table
function deleteSelected() {
  const selectedIds = getSelectedRowIds();
  if (selectedIds.length > 0) {
    // Send the selected IDs to the server to delete them from the database
    fetch("delete_categories.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ ids: selectedIds }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Remove selected rows from php_data and filtered_data
          for (let i = php_data.length - 1; i >= 0; i--) {
            if (selectedIds.includes(php_data[i].id.toString())) {
              php_data.splice(i, 1);
            }
          }

          for (let i = filtered_data.length - 1; i >= 0; i--) {
            if (selectedIds.includes(filtered_data[i].id.toString())) {
              filtered_data.splice(i, 1);
            }
          }

          renderTable(filtered_data, current_page, entries_per_page);
        } else {
          alert("Error deleting categories from database: " + data.error);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Error deleting categories from database");
      });
  } else {
    alert("No rows selected for deletion.");
  }
}
