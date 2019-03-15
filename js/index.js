$(()=>{

    loadFeaturedBrandsFilter();
}
);

function loadFeaturedBrandsFilter(){
    const brands = ['DC Comics', 'Disney', 'Dragon Ball Z','Game of Thrones','Marvel','Pokemon','Star Wars'];
    
    var template = $('#brand-filter').html();
    const item = (brand) => $('#brand-filter').html()
                                .replace('$brand',brand.replace(/\s/g, ""))
                                .replace('$brand',brand);

    var brandList  = $('<ul></ul>').html((brands).map(item).join(''));

    $('.filter-content').append(brandList);
}