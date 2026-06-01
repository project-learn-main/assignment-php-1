<main class="flex-1 bg-dark overflow-auto">
            <!-- Dashboard Tab -->
            <div id="dashboard-tab" class="tab-content <?php echo $activeTab == 'dashboard' ? 'block' : 'hidden'; ?> h-full">
                <?php include 'Element/dashboard/index.php'; ?>
            </div>

            <!-- Orders Tab -->
            <div id="orders-tab" class="tab-content <?php echo $activeTab == 'orders' ? 'block' : 'hidden'; ?> h-full">
                <?php include 'Element/orders/index.php'; ?>
            </div>

            <!-- Customers Tab -->      
            <div id="customers-tab" class="tab-content <?php echo $activeTab == 'customers' ? 'block' : 'hidden'; ?> h-full">
                <?php include 'Element/customers/index.php'; ?>
            </div>

            <!-- Students Tab -->
            <div id="students-tab" class="tab-content <?php echo $activeTab == 'students' ? 'block' : 'hidden'; ?> h-full">
                <?php include 'Element/students/index.php'; ?>
            </div>

            <!-- Modals -->
            <?php include 'Element/modals.php'; ?>
</main>