<script type="text/javascript" src="<?php echo URL.'/public/scripts/index.js' ?>"></script>
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="card mb-4 wow fadeIn">
            <div class="card-body d-sm-flex justify-content-between">
                <form class="d-flex justify-content-center" style="width:100%">
                    <input type="search" placeholder="Tìm kiếm" aria-label="Search" class="form-control"
                    onkeyup="search()" id="table_search">
                    <button class="btn btn-primary btn-sm my-0 p" type="button" onclick="search()">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="row wow fadeIn">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body" id="list_tainguyen">

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
