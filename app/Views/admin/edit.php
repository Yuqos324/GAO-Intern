<?= $this->extend('admin') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Input the interns</h5>

            <form action="/admin" method="post">

                <div class="form-group">
                    <label for="name">Name of Intern</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
                </div>

                <div class="form-group">
                    <label for="cof">Country of Residence</label>
                    <input type="text" class="form-control" id="cof" name="cof" aria-describedby="emailHelp" required>
                </div>

                <div class="form-group">
                    <label for="current_edu">Current Education</label>
                    <select class="form-control" name="edu_status" id="current_edu">
                        <option value="utilities">Utilities</option>
                        <option value="food_and_beverages"> Food & Beverages</option>
                        <option value="books">Books</option>
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