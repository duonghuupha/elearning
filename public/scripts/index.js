var page = 1; var tukhoa = '';
$(function(){
    $('#list_tainguyen').load(baseUrl + '/index/content?page='+page+'&q='+tukhoa);
});

function search(){
    var value = $('#table_search').val();
    if(value.length != 0){
        tukhoa = value.replaceAll(" ", "$", 'g');
        $('#list_tainguyen').load(baseUrl + '/index/content?page='+page+'&q='+tukhoa);
    }else{
        tukhoa = '';
        $('#list_tainguyen').load(baseUrl + '/index/content?page='+page+'&q='+tukhoa);
    }
}

function view_page_elearning(pages){
    page = pages;
    $('#list_tainguyen').load(baseUrl + '/index/content?page='+page+'&q='+tukhoa);
}
