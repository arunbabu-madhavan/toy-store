$(()=>{
   
    $('.filterHeader').click(function(){
        $(this).siblings('.filterBlock').toggle();
        if($(this).find('.filterHeaderTriangle').css('transform') !== 'none') 
            $(this).find('.filterHeaderTriangle').css('transform','none');
        else
            $(this).find('.filterHeaderTriangle').css('transform','rotate(90deg)');
    });

    $('.filterHeader').click();

    loadSearchResults();
});

function filterResults(keyParam,add,value){
    modifyQueryString('page',true,1,
        modifyQueryString('page',false,currentPage,
                modifyQueryString(keyParam,add,value,null,false),false),true);
}

function modifyQueryString(keyParam,add,value,url,pushState){
    var newURL = url || window.location.href;
    var filters = newURL.split("?")[1].split("&");
    var queryStringparameter = `${keyParam}=${value}`;
    if(add)
    {
        var exists = false;

        filters.forEach(function(filter){
           if(filter == queryStringparameter){
            exists = true;
           }
        });

        if(!exists)
            filters.push(queryStringparameter);

        newURL = newURL.split("?")[0] +'?' +filters.join("&");
       
     
         if(pushState)
            history.pushState({path:newURL}, null, newURL);
    }
    else
    {  
        var exists = false;

        filters.forEach(function(filter,idx,object){
           if(filter == queryStringparameter){
            object.splice(idx,1);
           }
        }); 
        newURL = newURL.split("?")[0] +'?' +filters.join("&");

         if(pushState)
             history.pushState({path:newURL}, null, newURL);
    }
    return newURL;
}
window.onpopstate = function (event) {
    window.location.reload();
};

function loadSearchResults(){
    $('.search-result').hide();
    $('.loading').show();
    $('.products-grid > div.productrow').empty();
    $.ajax({
        url:'api/filterProducts.php'+window.location.search,
        type:"GET",
        dataType:'json',
        success:(data)=>{
            var pageCount = data.pop();
            var totalCount = data.pop();
            const queries = readQueryString();
            $($('#searchHeader span')[0]).text(`${totalCount} results for`);
            
            bindProductTemplate(data,null,$('.products-grid > div.productrow'));
            
            var term = queries.search && queries.search[0];
            term = term ? decodeURIComponent(term):'';

            $('#searchHeader span.term').text(`'${term}'`);
            document.getElementsByName('search')[0].value = term;
            if(queries.page)
                currentPage = queries.page[0];

            setPagination(currentPage,pageCount);
            $('.loading').hide();
            $('.search-result').show();
        }
    });
}
var currentPage;

function setPagination(pageNo,pageCount){
    $('.productsPagination > ul').empty();
    $('.productsPagination > ul').append("<li class='back'>«</li>");
    $('.productsPagination > ul').append("<li class='next'>»</li>");

    if(pageCount!==1)
        for(var i=pageCount;i>=1;i--){
                var pageItem = $('<li></li>').text(i);
                if(pageNo == i)
                    pageItem.addClass('selected');
                $('.productsPagination > ul > li:first-child').after(pageItem);
        }
    if(pageNo == 1)
        $('.productsPagination > ul > li:first-child').remove();
    if(pageNo == pageCount || pageCount ==0)
        $('.productsPagination > ul > li:last-child').remove();

        $('.productsPagination > ul > li').click(function(){
            var clickedPageNo;
            $('.productsPagination > ul > li').removeClass('selected');

            if($(this).hasClass('back'))
                clickedPageNo = parseInt(currentPage)-1;
            else if($(this).hasClass('next'))
                clickedPageNo = parseInt(currentPage)+1;
            else
                clickedPageNo = parseInt($(this).text());
            
            modifyQueryString('page',true,clickedPageNo,
                        modifyQueryString('page',false,currentPage,null,false),true);
            currentPage = clickedPageNo;

            setPagination(clickedPageNo,pageCount);
            loadSearchResults();
        });
}
