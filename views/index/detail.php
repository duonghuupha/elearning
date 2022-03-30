<?php
$item = $this->jsonObj;
$link = URL_E.'/'.$item[0]['truonghoc_id'].'/'.$item[0]['exam_id'].'/'.$item[0]['user_id'];
?>
<style>
.trai p, .phai p{
    margin-bottom: 0;
}
.trai i{
    font-weight:700;
}
</style>
<script type="text/javascript" src="<?php echo URL.'/public/scripts/index.js' ?>"></script>
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="card mb-4 wow fadeIn">
            <div class="card-body d-sm-flex justify-content-between">
                <div class="trai">
                    <small>
                        <p>Nhóm dữ liệu: <i><?php echo $item[0]['exam'] ?></i></p>
                        <p>Lĩnh vực: <i><?php echo $item[0]['linh_vuc'] ?></i></p>
                        <p>Đề tài: <i><?php echo $item[0]['de_tai'] ?></i></p>
                    </small>
                </div>
                <div class="phai">
                    <small>
                        <p>Trường học: <i><?php echo $item[0]['truonghoc'] ?></i></p>
                        <p>Tác giả: <i><?php echo $item[0]['nguoitao'] ?></i></p>
                        <p>Ngày cập nhật: <i><?php echo date("H:i:s d-m-Y", strtotime($item[0]['create_at'])) ?></i></p>
                    </small>
                </div>
            </div>
        </div>
        <div class="row wow fadeIn">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo $link ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
