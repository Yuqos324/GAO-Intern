<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->include('admin/layouts/head')?>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

            <?= $this->include('admin/layouts/navbar')?>
            
        </nav>
        <div id="layoutSidenav">

            <?= $this->include('admin/layouts/sidebar')?>

            <div id="layoutSidenav_content">
                <main>
                    <?= $this->renderSection('content')?>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?= $this->include('admin/layouts/footer')?>
                </footer>
            </div>
        </div>
        <?= $this->include('admin/layouts/scripts')?>
    </body>
</html>
