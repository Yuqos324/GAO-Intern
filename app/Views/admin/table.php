<?= $this->extend('admin') ?>
<?= $this->section('content') ?>

<br>

<div class="container-fluid px-4">
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
                            <th>Action</th>
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
                            <td>
                            <div class="btn-group " role="group " aria-label="Basic example ">
                                <form action="/product/<?= $item['id'] ?>" method="POST" onsubmit="return confirm(`Are you sure?`)">
                                    <a href="/product/<?= $item['id'] ?>/edit" class="btn btn-info text-white ">Edit</a>
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger text-white" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                            </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>