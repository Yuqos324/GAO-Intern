<?= $this->extend('admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <br>

    <div class="card text mb-3" style="max-width: 18rem;">
        <div class="card-header">Number of interns listed</div>
        <div class="card-body">
            <h1><?php $intern_count ?></h1>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Interns
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Country of Residence</th>
                            <th>Current Education</th>
                            <th>Education Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        <?php foreach ($interns as $item):?>
                        <tr>
                            <td><?= $no += 1;?></td>
                            <td><?= $item['name']?></td>
                            <td><?= $item['cof']?></td>
                            <td><?= $item['current_edu']?></td>
                            <td><?= $item['edu_status']?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="/export" class="btn btn-success ">
        Export       
    </a>
</div>
<br>

<?= $this->endSection() ?>