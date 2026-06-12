// Modal functions for Tailwind CSS
function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    document.body.style.overflow = "hidden";

    if (!modalId.includes("update")) {
      const form = modal.querySelector("form");
      if (form) {
        form.reset();
      }
    }
  }
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
    document.body.style.overflow = "auto";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Handle URL parameter to switch tabs (but don't trigger save/reset)
  const urlParams = new URLSearchParams(window.location.search);
  const tab = urlParams.get("tab");
  console.log("🚀 ~ tab:", tab);
  if (tab) {
    const targetLink = document.querySelector(`[data-tab="${tab}"]`);
    if (targetLink) {
      // Manually set active state without triggering click event
      const navLinks = document.querySelectorAll("[data-tab]");
      const tabContents = document.querySelectorAll(".tab-content");

      // Remove active states from all tabs
      navLinks.forEach((navLink) => {
        navLink.classList.remove("bg-primary", "text-white");
        navLink.classList.add("text-gray-300");
      });

      // Add active state to target tab
      targetLink.classList.remove("text-gray-300");
      targetLink.classList.add("bg-primary", "text-white");

      // Hide all tab contents
      tabContents.forEach((content) => {
        content.classList.add("hidden");
      });

      // Show target tab content
      const targetContent = document.getElementById(tab + "-tab");
      if (targetContent) {
        targetContent.classList.remove("hidden");
        targetContent.classList.add("block");
      }
    }
  }

  // Tab switching functionality
  const navLinks = document.querySelectorAll("[data-tab]");
  const tabContents = document.querySelectorAll(".tab-content");

  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      // Get current and target tab
      const currentTab = document.querySelector(".tab-content:not(.hidden)");
      const targetTab = this.getAttribute("data-tab");

      // Only proceed if actually switching tabs
      if (currentTab && currentTab.id === targetTab + "-tab") {
        return; // Don't do anything if clicking the same tab
      }

      // Remove active states from all tabs
      navLinks.forEach((navLink) => {
        navLink.classList.remove("bg-primary", "text-white");
        navLink.classList.add("text-gray-300");
      });

      // Add active state to clicked tab
      this.classList.remove("text-gray-300");
      this.classList.add("bg-primary", "text-white");

      // Hide all tab contents
      tabContents.forEach((content) => {
        content.classList.add("hidden");
      });

      // Show target tab content
      const targetContent = document.getElementById(targetTab + "-tab");
      if (targetContent) {
        targetContent.classList.remove("hidden");
        targetContent.classList.add("block");
      }

      // Save tab state to session and reset pagination
      saveTabState(targetTab);

      // Reset pagination to page 1 only when actually switching tabs
      resetPaginationToPage1();
    });
  });

  // Modal close on outside click
  document.addEventListener("click", function (e) {
    if (
      e.target.classList.contains("fixed") &&
      e.target.classList.contains("inset-0")
    ) {
      const modal = e.target.querySelector('[id$="Modal"]');
      if (modal) {
        closeModal(modal.id);
      }
    }
  });

  // Modal close on Escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      document
        .querySelectorAll('[id$="Modal"]:not(.hidden)')
        .forEach((modal) => {
          closeModal(modal.id);
        });
    }
  });
});

// Toast notification function - dùng Tailwind CSS
function showToast(message, type = "success") {
  // Create toast container if it doesn't exist
  let toastContainer = document.getElementById("toastContainer");
  if (!toastContainer) {
    toastContainer = document.createElement("div");
    toastContainer.id = "toastContainer";
    toastContainer.className = "fixed top-4 right-4 z-50 space-y-2";
    document.body.appendChild(toastContainer);
  }

  // Create toast element
  const toastId = "toast-" + Date.now();
  const toast = document.createElement("div");

  const typeClasses = {
    success: "bg-green-500 text-white",
    error: "bg-red-500 text-white",
    info: "bg-blue-500 text-white",
  };

  toast.className = `${typeClasses[type]} px-4 py-3 rounded-lg shadow-lg flex items-center justify-between min-w-[250px] max-w-[350px] transform translate-x-full transition-all duration-300 ease-out`;

  toast.innerHTML = `
    <span class="flex-1">${message}</span>
    <button type="button" class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.remove()">
      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
  `;

  // Add toast to container
  toastContainer.appendChild(toast);

  // Animation - slide vào
  setTimeout(() => {
    toast.classList.remove("translate-x-full");
    toast.classList.add("translate-x-0");
  }, 10);

  // Auto remove - slide ra
  setTimeout(() => {
    toast.classList.remove("translate-x-0");
    toast.classList.add("translate-x-full");
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

// Functions to handle update and delete modals
function viewDetailOrder(orderId) {
  const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");

  const orderInfo = cells[0].textContent.trim();
  const customerName = cells[1].textContent.trim();

  const unitPrice = Number(cells[3].textContent.replace("$", ""));
  const quantity = Number(cells[4].textContent);

  // document.getElementById("viewOrderId").textContent = orderInfo;
  console.log(
    `🚀 ~ viewDetailOrder ~ document.getElementById("viewOrderId"):`,
    document.getElementById("viewOrderId"),
  );
  document.getElementById("viewOrderCustomer").textContent = customerName;

  const itemsContainer = document.getElementById("viewOrderItems");
  itemsContainer.innerHTML = "";

  const itemDiv = document.createElement("div");
  itemDiv.className = "bg-gray-900 rounded-lg p-3 border border-gray-700";

  itemDiv.innerHTML = `
    <div class="flex justify-between items-start">
      <div class="flex-1">
        <p class="text-white font-medium">Product</p>
        <p class="text-gray-400 text-sm">${quantity} x $${unitPrice.toFixed(2)}</p>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzSOrIHIncvVwcn86Yj1lG2no3rymRPhF1AQ&s"
        class="w-20 h-20"
        alt="img product" />
         </div>
    </div>
  `;

  itemsContainer.appendChild(itemDiv);

  openModal("viewOrderDetailsModal");
}

function generateSampleItems(itemCount, totalAmount) {
  const items = [];
  const products = [
    { name: "Laptop Pro", description: "High-performance laptop" },
    { name: "Wireless Mouse", description: "Ergonomic wireless mouse" },
    { name: "USB-C Hub", description: "Multi-port USB hub" },
    { name: "Mechanical Keyboard", description: "RGB mechanical keyboard" },
    { name: "Monitor Stand", description: "Adjustable monitor stand" },
    { name: "Webcam HD", description: "1080p HD webcam" },
    { name: "Desk Lamp", description: "LED desk lamp" },
    { name: "Headphones", description: "Noise-cancelling headphones" },
  ];

  const avgPrice = totalAmount / itemCount;

  for (let i = 0; i < itemCount; i++) {
    const product = products[i % products.length];
    const quantity = Math.floor(Math.random() * 2) + 1;
    const price = avgPrice * (0.8 + Math.random() * 0.4);

    items.push({
      name: product.name,
      description: product.description,
      quantity: quantity,
      price: price,
      total: price * quantity,
    });
  }

  return items;
}

function printOrderDetails() {
  const modalContent = document.querySelector(
    "#viewOrderDetailsModal .bg-gray-800",
  );
  const printWindow = window.open("", "_blank");

  printWindow.document.write(`
    <html>
      <head>
        <title>Order Details</title>
        <style>
          body { font-family: Arial, sans-serif; margin: 20px; }
          .header { border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
          .section { margin-bottom: 20px; }
          .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
          .label { font-weight: bold; color: #666; }
          table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
          th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
          th { background-color: #f5f5f5; }
          .text-right { text-align: right; }
          .total { font-size: 18px; font-weight: bold; }
        </style>
      </head>
      <body>
        <div class="header">
          <h1>Order Details</h1>
        </div>
        ${modalContent.innerHTML}
      </body>
    </html>
  `);

  printWindow.document.close();
  printWindow.print();
}

function updateOrder(orderId) {
  // Get order data from the table row
  const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const customerName = cells[1].textContent;
  const amount = cells[3].textContent.replace("$", "");
  const items = cells[4].textContent;
  const status = cells[5].textContent.trim();

  // Populate the update modal
  document.getElementById("updateOrderId").value = orderId;
  document.getElementById("updateOrderCustomer").value = customerName;
  document.getElementById("updateOrderAmount").value = amount;
  document.getElementById("updateOrderItems").value = items;
  document.getElementById("updateOrderStatus").value = status.toLowerCase();

  openModal("updateOrderModal");
}

function deleteOrder(orderId) {
  const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
  if (!row) return;

  const orderInfo = row.querySelector("td:first-child").textContent;
  document.getElementById("deleteOrderId").value = orderId;
  document.getElementById("deleteOrderInfo").textContent = orderInfo;

  openModal("deleteOrderModal");
}

function updateCustomer(customerId) {
  // Get customer data from table row
  const row = document.querySelector(`tr[data-customer-id="${customerId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const id = cells[0].textContent; // ID
  const name = cells[1].textContent; // Tên khách hàng
  const phone = cells[2].textContent; // Sô diên thoai
  const dateOfBirth = cells[3].textContent; // Ngày sinh
  const gender = cells[4].textContent; // Giói tính
  const address = cells[5].textContent; // Dia chi

  // Populate update modal with table data
  document.getElementById("updateCustomerId").value = id;
  document.getElementById("updateCustomerName").value = name;
  document.getElementById("updateCustomerPhone").value = phone;
  document.getElementById("updateCustomerDateOfBirth").value = dateOfBirth;
  document.getElementById("updateCustomerGender").value = gender;
  document.getElementById("updateCustomerAddress").value = address;

  // Get image src from img element in cell 7
  const imageCell = cells[6];
  const imgElement = imageCell.querySelector("img");
  const imageSrc = imgElement ? imgElement.src : "";

  // Display current image in modal
  document.getElementById("currentCustomerImage").src =
    imageSrc || "https://via.placeholder.com/50";
  document.getElementById("currentCustomerImagePath").textContent =
    imageSrc || "No image";

  openModal("updateCustomerModal");
}

function deleteCustomer(customerId) {
  const row = document.querySelector(`tr[data-customer-id="${customerId}"]`);
  if (!row) return;

  const customerInfo = row.querySelector("td:nth-child(2)").textContent;
  document.getElementById("deleteCustomerId").value = customerId;
  document.getElementById("deleteCustomerInfo").textContent = customerInfo;

  openModal("deleteCustomerModal");
}

function updateProduct(productId, categoryId) {
  console.log("🚀 ~ updateProduct ~ categoryId:", categoryId);
  // Get product data from table row
  const row = document.querySelector(`tr[data-product-id="${productId}"]`);
  console.log("🚀 ~ updateProduct ~ row:", row);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  console.log("🚀 ~ updateProduct ~ cells:", cells);
  const id = cells[0].textContent;
  const name = cells[1].textContent;
  const description = cells[3].textContent;

  // Populate update modal with table data
  document.getElementById("updateProductId").value = productId;
  document.getElementById("updateProductName").value = name;
  document.getElementById("updateProductDescription").value = description;
  document.getElementById("updateCategoryId").value = categoryId;

  // Get image src from img element in cell 6
  const imageCell = cells[5];
  const imgElement = imageCell.querySelector("img");
  const imageSrc = imgElement ? imgElement.src : "";
  console.log("🚀 ~ updateProduct ~ imageSrc:", imageSrc);

  // Display current image in modal
  document.getElementById("currentProductImage").src =
    imageSrc || "https://via.placeholder.com/50";

  openModal("updateProductModal");
}

function deleteProduct(productId) {
  const row = document.querySelector(`tr[data-product-id="${productId}"]`);
  if (!row) return;

  const productInfo = row.querySelector("td:nth-child(2)").textContent;
  document.getElementById("deleteProductId").value = productId;
  document.getElementById("deleteProductInfo").textContent = productInfo;

  openModal("deleteProductModal");
}

function viewProduct(productId) {
  const row = document.querySelector(`tr[data-product-id="${productId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const id = cells[0].textContent;
  const name = cells[1].textContent;
  const phone = cells[2].textContent;
  const dateOfBirth = cells[3].textContent;
  const gender = cells[4].textContent;
  const address = cells[5].textContent;
  const imageSrc = cells[6].querySelector("img").src;

  // Populate view modal with table data
  document.getElementById("viewProductId").textContent = "ID: " + id;
  document.getElementById("viewProductName").textContent = name;
  document.getElementById("viewProductPhone").textContent = phone;
  document.getElementById("viewProductDateOfBirth").textContent =
    dateOfBirth || "N/A";
  document.getElementById("viewProductGender").textContent = gender || "N/A";
  document.getElementById("viewProductAddress").textContent = address || "N/A";
  document.getElementById("viewProductImage").src = imageSrc;
  document.getElementById("viewProductImage").alt = name;

  openModal("viewProductModal");
}

function updateUser(userID) {
  console.log("🚀 ~ updateUser ~ userID:", userID);
  // Get product data from table row
  const row = document.querySelector(`tr[data-user-id="${userID}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const id = cells[0].textContent; // Mã SV
  const name = cells[1].textContent; // Tên SV
  const email = cells[2].textContent; // Email
  const phone = cells[3].textContent; // Sô diên thoai
  const gender = cells[4].textContent; // Giói tính
  const address = cells[5].textContent; // Quê quán
  // const status = cells[6].querySelector("select").value; // Trang thái

  // Populate update modal with table data
  document.getElementById("updateUserId").value = userID;
  console.log(
    `🚀 ~ updateUser ~ document.getElementById("updateUserId").value:`,
    document.getElementById("updateUserId").value,
  );
  document.getElementById("updateUserName").value = name;
  document.getElementById("updateUserPhone").value = phone;
  // Set gender select value manually
  const genderSelect = document.getElementById("updateUserGender");
  for (let i = 0; i < genderSelect.options.length; i++) {
    genderSelect.options[i].selected = genderSelect.options[i].value === gender;
  }

  document.getElementById("updateUserAddress").value = address;

  // Set status select value manually
  const statusSelect = document.getElementById("updateUserStatus");
  // for (let i = 0; i < statusSelect.options.length; i++) {
  //   statusSelect.options[i].selected = statusSelect.options[i].value === status;
  // }

  // Get image src from img element in cell 8
  const imageCell = cells[7];
  const imgElement = imageCell.querySelector("img");
  const imageSrc = imgElement ? imgElement.src : "";

  // Display current image in modal
  document.getElementById("currentStudentImage").src =
    imageSrc || "https://via.placeholder.com/50";
  document.getElementById("currentStudentImagePath").textContent =
    imageSrc || "No image";

  openModal("updateUserModal");
}

function deleteUser(userID) {
  console.log("🚀 ~ deleteUser ~ userID:", userID);
  const row = document.querySelector(`tr[data-user-id="${userID}"]`);
  if (!row) return;

  const productInfo = row.querySelector("td:nth-child(2)").textContent;
  document.getElementById("deleteUserId").value = userID;
  document.getElementById("deleteUserInfo").textContent = productInfo;

  openModal("deleteUserModal");
}

function viewUser(userID) {
  const row = document.querySelector(`tr[data-user-id="${userID}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const id = cells[0].textContent;
  const name = cells[1].textContent;
  const phone = cells[2].textContent;
  const dateOfBirth = cells[3].textContent;
  const gender = cells[4].textContent;
  const address = cells[5].textContent;
  const imageSrc = cells[6].querySelector("img").src;

  // Populate view modal with table data
  document.getElementById("viewUserId").textContent = "ID: " + id;
  document.getElementById("viewUserName").textContent = name;
  document.getElementById("viewUserPhone").textContent = phone;
  document.getElementById("viewUserDateOfBirth").textContent =
    dateOfBirth || "N/A";
  document.getElementById("viewUserGender").textContent = gender || "N/A";
  document.getElementById("viewUserAddress").textContent = address || "N/A";
  document.getElementById("viewUserImage").src = imageSrc;
  document.getElementById("viewUserImage").alt = name;

  openModal("viewUserModal");
}

// Function to save tab state to session
function saveTabState(tab) {
  fetch("actions/save_tab.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ tab: tab }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        console.log("Tab state saved:", data.tab);
      } else {
        console.error("Failed to save tab state:", data.error);
      }
    })
    .catch((error) => {
      console.error("Error saving tab state:", error);
    });
}

function viewCategory(categoryId) {
  const row = document.querySelector(`tr[data-category-id="${categoryId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const id = cells[0].textContent; // Mã SV
  const name = cells[1].textContent; // Tên SV
  const email = cells[2].textContent; // Email
  const phone = cells[3].textContent; // Sô diên thoai
  const gender = cells[4].textContent; // Giói tính
  const address = cells[5].textContent; // Quê quán
  const status = cells[6].textContent; // Trang thái
  const imageSrc = cells[7].querySelector("img").src;

  // Populate view modal with table data
  document.getElementById("viewCategoryId").textContent = "ID: " + id;
  document.getElementById("viewCategoryName").textContent = name;
  document.getElementById("viewCategoryEmail").textContent = email;
  document.getElementById("viewCategoryPhone").textContent = phone;
  document.getElementById("viewCategoryGender").textContent = gender;
  document.getElementById("viewCategoryAddress").textContent = address;
  document.getElementById("viewCategoryImage").src = imageSrc;
  document.getElementById("viewCategoryImage").alt = name;

  openModal("viewCategoryModal");
}

function updateCategory(categoryId) {
  console.log("🚀 ~ updateUser ~ userID:", categoryId);
  // Get product data from table row
  const row = document.querySelector(`tr[data-category-id="${categoryId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const id = cells[0].textContent;
  const name = cells[1].textContent;
  const description = cells[2].textContent;

  // Populate update modal with table data
  document.getElementById("updateCategoryId").value = categoryId;
  document.getElementById("updateCategoryName").value = name;
  document.getElementById("updateCategoryDescription").value = description;

  openModal("updateCategoryModal");
}

function deleteCategory(categoryId) {
  console.log("🚀 ~ deleteUser ~ userID:", categoryId);
  const row = document.querySelector(`tr[data-category-id="${categoryId}"]`);
  if (!row) return;

  const productInfo = row.querySelector("td:nth-child(2)").textContent;
  document.getElementById("deleteCategoryId").value = categoryId;
  document.getElementById("deleteCategoryInfo").textContent = productInfo;

  openModal("deleteCategoryModal");
}

// Function to reset pagination to page 1
function resetPaginationToPage1() {
  // Only reset pagination for the currently visible tab
  const activeTabContent = document.querySelector(".tab-content:not(.hidden)");
  if (activeTabContent) {
    const paginationLinks =
      activeTabContent.querySelectorAll('a[href*="page="]');
    paginationLinks.forEach((link) => {
      const href = link.getAttribute("href");
      if (href) {
        // Replace page parameter with page=1
        const newHref = href.replace(/page=\d+/, "page=1");
        link.setAttribute("href", newHref);
      }
    });
  }
}
