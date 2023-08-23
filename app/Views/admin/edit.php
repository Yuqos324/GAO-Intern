<?= $this->extend('admin') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Updating Intern</h5>

            <form action="/admin/<?= $data['id'] ?>" method="post">
                <input type="hidden" name="_method" value="put"/>

                <div class="form-group">
                    <label for="name">Name of Intern</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required value="<?= $data['name']?>">
                </div>

                <div class="form-group">
                    <label for="cof">Country of Residence</label>
                    <select name="cof" class="form-control" id="cof"></select>
                </div>

                <div class="form-group">
                    <label for="current_edu">Current Education</label>
                    <select class="form-control" name="current_edu" id="current_edu">
                        <option value="Diploma"<?= $data['current_edu'] == "Diploma" ? "selected" : "" ?>>Diploma</option>
                        <option value="Associate Degree"<?= $data['current_edu'] == "Associate Degree" ? "selected" : "" ?>> Associate Degree</option>
                        <option value="Bachelor's Degree"<?= $data['current_edu'] == "Bachelor's Degree" ? "selected" : "" ?>>Bachelor's Degree</option>
                        <option value="Master's Degree"<?= $data['current_edu'] == "Master's Degree" ? "selected" : "" ?>>Master's Degree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edu_status">Education Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="edu_status" id="ongoing" value="Ongoing">
                        <label class="form-check-label" for="ongoing">
                            Ongoing
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="edu_status" id="graduated" value="Graduated">
                        <label class="form-check-label" for="graduated">
                            Graduated
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
