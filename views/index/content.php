<?php
$convert = new Convert(); $jsonObj = $this->jsonObj; $perpage = $this->perpage;
$pages = $this->page;
?>
<table class="table table-hover">
    <thead class="blue-grey lighten-4">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center" style="width:250px">Nhóm dữ liệu</th>
            <th class="text-center">Lĩnh vực</th>
            <th class="text-center">Đề tài</th>
            <th class="text-center">Cập nhật lần cuối</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            if($row['is_e'] == 1){
                $img = '<img src="'.URL.'/styles/img/ele.png" width="50px"/>';
            }else{
                $img = '<img src="'.URL.'/styles/img/tn.png" width="50px"/>';
            }
        ?>
        <tr>
            <th scope="row" class="text-center"><?php echo $i ?></th>
            <td class="text-center">
                <?php echo $img ?>
            </td>
            <td><?php echo $row['exam'] ?></td>
            <td><?php echo $row['linh_vuc'] ?></td>
            <td>
                <a href="<?php echo URL.'/index/detail?id='.base64_encode($row['id']) ?>">
                    <?php echo $row['de_tai'] ?> <i class="fa fa-search"></i>
                </a>
            </td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
if($jsonObj['total'] > $perpage){
    $pagination = $convert->pagination($jsonObj['total'], $pages, $perpage);
    $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_elearning', 1);
?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php echo $createlink ?>
    </ul>
</nav>
<?php
}
?>
