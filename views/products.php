 <!-- Breadcrumb -->
    <div class="max-w-6xl mx-auto px-4 py-4">
        <p class="text-gray-500">
            <a href="../index.html" class="text-blue-500 no-underline" style="color: var(--accent);">Trang chủ</a>
            <span class="text-gray-500"> / </span>
            <span style="color: var(--primary);">Sản phẩm</span>
        </p>
    </div>
    
<section class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-12" style="color: var(--primary);">Tất Cả Sản Phẩm</h1>

            <!-- Filter -->
            <div class="mb-8 flex flex-wrap gap-4">
                <button onclick="filterProducts('all')" class="filter-btn active px-6 py-3 rounded text-white transition-all duration-300" data-filter="all" style="background-color: var(--primary);">
                    Tất Cả
                </button>
                <button onclick="filterProducts('under500')" class="filter-btn px-6 py-3 rounded border transition-all duration-300" data-filter="under500" style="border-color: var(--border-light); color: var(--primary);">
                    Dưới 500K
                </button>
                <button onclick="filterProducts('over500')" class="filter-btn px-6 py-3 rounded border transition-all duration-300" data-filter="over500" style="border-color: var(--border-light); color: var(--primary);">
                    Trên 500K
                </button>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6" id="productsGrid"></div>
        </div>
    </section>