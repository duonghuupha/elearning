<?php
class Convert{

	//pagination
    function pagination($total, $get_pages, $per_page = 20){
        $perpage = $per_page;
        $posts  = $total;
        $pages  = ceil($posts / $perpage);
        //$get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $data = array(
            'options' => array(
                'default'   => 1,
                'min_range' => 1,
                'max_range' => $pages
            )
        );

        $number = trim($get_pages);
        $number = filter_var($number, FILTER_VALIDATE_INT, $data);
        $range  = $perpage * ($number - 1);
        $prev = $number - 1;
        $next = $number + 1;
        $pagination = array('range' => $range, 'perpage' => $perpage, 'prev' => $prev, 'next' => $next, 'number' => $number, 'pages' => $pages);
        return $pagination;
    }

	function createLinks_event($total, $rows, $currentpage, $event, $links = 7) {
        $last = ceil( $total / $rows );
        $start = ( ( $currentpage - $links ) > 0 ) ? $currentpage - $links : 1;
        $end = ( ( $currentpage + $links ) < $last ) ? $currentpage + $links : $last;

        $html = '';
        $class = ( $currentpage == 1 ) ? "active" : "";
        $html .= '<li class="page-item ' . $class . '">';
        if($currentpage > 1){
            $html .= '<a class="page-link" href="javascript:void(0)" onclick="'.$event.'('.( $currentpage - 1 ).')">&laquo;</a>';
            }
        $html .= '</li>';
        if ( $start > 1 ) {
            $html .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="'.$event.'(1)">1</ahref=></li>';
            $html .= '<li class=" page-itemactive">';
            $html .= '<a class="page-link" href="javascript:void(0)">...</a></li>';
        }
        for ( $i = $start ; $i <= $end; $i++ ) {
            $class = ( $currentpage == $i ) ? "active" : "";
            $html .= '<li class="page-item ' . $class . '">';
            $html .= '<a class="page-link" href="javascript:void(0)" onclick="'.$event.'('.$i.')">' . $i . '</a>';
            $html .= '</li>';
        }
        if ( $end < $last ) {
            $html .= '<li class="page-item active ao">';
            $html .= '<a class="page-link" href="javascript:void(0)">...</a></li>';
            $html .= '<li class="page-item">';
            $html .= '<a class="page-link" href="javascript:void(0)" onclick="'.$event.'('.$last.')">' . $last . '</a>';
            $html .= '</li>';
        }
        if( $currentpage  < $last ){
            $html .= '<li class="page-item ' . $class . '"><a class="page-link" href="javascript:void(0)" onclick="'.$event.'('.( $currentpage + 1 ).')">&raquo;</a></li>';
        }

        return $html;
    }
}
?>
