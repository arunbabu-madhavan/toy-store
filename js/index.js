$(()=>{
    var i=0;

    loadFeaturedBrandsFilter();
    loadProducts('newArrivals', $('#new-arrivals'),null);
    loadProducts('trending', null,$('#trending .productrow'));
    loadProducts('hotSellers' ,null,$('#hot-sellers .productrow'));

    window.setInterval(()=>{
        $('#slides_'+((++i%6)+1).toString()).trigger('click');},2800);
    }
);

function loadFeaturedBrandsFilter(){

    const brands = [
         {id:4,name:'Anime'},
         {id:5,name:'DC Comics'},
         {id:18,name:'Disney'},
         {id:6,name:'Dragon Ball Z'},
         {id:7,name:'Game of Thrones'},
         {id:8,name:'Godzilla'},
         {id:9,name:'LEGO'},
         {id:10,name:'Marvel'},
         {id:11,name:'Pokemon'},
         {id:12,name:'Star Wars'},
         {id:13,name:'Transformers'}];

    const item = ({id,name}) => $('#brand-filter').html()
                                .replace('$brand',name)
                                .replace('$filter',id);

    var brandList  = $('<ul></ul>').html((brands).map(item).join(''));

    $('.filter-content').append(brandList);
}
