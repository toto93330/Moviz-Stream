var host = window.location.host;
var protocol = window.location.protocol;
var pathname = window.location.pathname;
var min = 6
function onClickMoreVideo() {
    var w = document.getElementById("load-data");
    var x = document.getElementById("js-button");
    var z = document.querySelectorAll("#js-items").length;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.response;
            
            if(data.length == 0){
                 x.innerHTML = '<div class="d-flex justify-content-center pb-5">'+
                        '<p class="text-danger"> No more movies for moments</p>'+
                    '</div>';
            }


            for (let index = 0; index < this.response.length; index++) {
                w.innerHTML += '<div class="b-block ml-3 mr-3 mb-5 video-items" data-slick-index="0" aria-hidden="false" style="width: 432px;" tabindex="0" id="js-items">'+
                            '<a href="/movie/'+ data[index].slug +'" tabindex="0">'+
                                '<div class="block-images position-relative">'+
                                    '<div class="img-box">'+
                                        '<img src="'+ data[index].image +'" class="img-fluid" alt="">'+
                                    '</div>'+
                                    '<div class="block-description">'+
                                        '<h6>The Last Breath</h6>'+
                                        '<div class="movie-time d-flex align-items-center my-2">'+
                                            '<div class="badge badge-secondary p-1 mr-2">'+ data[index].ageadapt +'</div>'+
                                            '<span class="text-white">'+ data[index].time +'</span>'+
                                        '</div>'+
                                        '<div class="hover-buttons">'+
                                            '<span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>'+
                                                'Play Now'+
                                            '</span>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="block-social-info">'+
                                        '<ul class="list-inline p-0 m-0 music-play-lists">'+
                                            '<li><span><i class="ri-heart-fill"></i></span></li>'+
                                            '<li><span><i class="ri-add-line"></i></span></li>'+
                                        '</ul>'+
                                    '</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>';
                
            }

        }
    }

        var url = protocol + "//" + host + "/ajax/all-movie/"+this.min;

        this.min = this.min + 6;
        xhr.open("GET", url);
        xhr.responseType = "json";
        xhr.send();
};


function onClickMoreSerie() {
    var w = document.getElementById("load-data");
    var x = document.getElementById("js-button");
    var z = document.querySelectorAll("#js-items").length;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.response;
            
            if(data.length == 0){
                 x.innerHTML = '<div class="d-flex justify-content-center pb-5">'+
                        '<p class="text-danger"> No more series for moments</p>'+
                    '</div>';
            }


            for (let index = 0; index < this.response.length; index++) {
                w.innerHTML += '<div class="b-block ml-3 mr-3 mb-5 video-items" data-slick-index="0" aria-hidden="false" style="width: 432px;" tabindex="0" id="js-items">'+
                            '<a href="/serie/'+ data[index].id +'/1/'+ data[index].slug +'" tabindex="0">'+
                                '<div class="block-images position-relative">'+
                                    '<div class="img-box">'+
                                        '<img src="'+ data[index].image +'" class="img-fluid" alt="">'+
                                    '</div>'+
                                    '<div class="block-description">'+
                                        '<h6>The Last Breath</h6>'+
                                        '<div class="movie-time d-flex align-items-center my-2">'+
                                            '<span class="text-white">'+ data[index].time +'</span>'+
                                        '</div>'+
                                        '<div class="hover-buttons">'+
                                            '<span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>'+
                                                'Play Now'+
                                            '</span>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="block-social-info">'+
                                        '<ul class="list-inline p-0 m-0 music-play-lists">'+
                                            '<li><span><i class="ri-heart-fill"></i></span></li>'+
                                            '<li><span><i class="ri-add-line"></i></span></li>'+
                                        '</ul>'+
                                    '</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>';
                
            }

        }
    }

        var url = protocol + "//" + host + "/ajax/all-movie/"+this.min;

        this.min = this.min + 6;
        xhr.open("GET", url);
        xhr.responseType = "json";
        xhr.send();
};


function onClickMorCategoryVideo(id) {
    var w = document.getElementById("load-data");
    var x = document.getElementById("js-button");
    var z = document.querySelectorAll("#js-items").length;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.response;
            
            if(data.length == 0){
                 x.innerHTML = '<div class="d-flex justify-content-center pb-5">'+
                        '<p class="text-danger"> No more movies for moments for this category</p>'+
                    '</div>';
            }


            for (let index = 0; index < this.response.length; index++) {
                w.innerHTML += '<div class="b-block ml-3 mr-3 mb-5 video-items" data-slick-index="0" aria-hidden="false" style="width: 432px;" tabindex="0" id="js-items">'+
                            '<a href="/movie/'+ data[index].slug +'" tabindex="0">'+
                                '<div class="block-images position-relative">'+
                                    '<div class="img-box">'+
                                        '<img src="'+ data[index].image +'" class="img-fluid" alt="">'+
                                    '</div>'+
                                    '<div class="block-description">'+
                                        '<h6>The Last Breath</h6>'+
                                        '<div class="movie-time d-flex align-items-center my-2">'+
                                            '<div class="badge badge-secondary p-1 mr-2">'+ data[index].ageadapt +'</div>'+
                                            '<span class="text-white">'+ data[index].time +'</span>'+
                                        '</div>'+
                                        '<div class="hover-buttons">'+
                                            '<span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>'+
                                                'Play Now'+
                                            '</span>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="block-social-info">'+
                                        '<ul class="list-inline p-0 m-0 music-play-lists">'+
                                            '<li><span><i class="ri-heart-fill"></i></span></li>'+
                                            '<li><span><i class="ri-add-line"></i></span></li>'+
                                        '</ul>'+
                                    '</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>';
                
            }

        }
    }

        var url = protocol + "//" + host + "/ajax/movies/category/"+ id +"/"+this.min;

        this.min = this.min + 6;
        xhr.open("GET", url);
        xhr.responseType = "json";
        xhr.send();
};


function onClickMoreCategorySerie(id) {
    var w = document.getElementById("load-data");
    var x = document.getElementById("js-button");
    var z = document.querySelectorAll("#js-items").length;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.response;
            
            if(data.length == 0){
                 x.innerHTML = '<div class="d-flex justify-content-center pb-5">'+
                        '<p class="text-danger"> No more series for moments</p>'+
                    '</div>';
            }


            for (let index = 0; index < this.response.length; index++) {
                w.innerHTML += '<div class="b-block ml-3 mr-3 mb-5 video-items" data-slick-index="0" aria-hidden="false" style="width: 432px;" tabindex="0" id="js-items">'+
                            '<a href="/serie/'+ data[index].id +'/1/'+ data[index].slug +'" tabindex="0">'+
                                '<div class="block-images position-relative">'+
                                    '<div class="img-box">'+
                                        '<img src="'+ data[index].image +'" class="img-fluid" alt="">'+
                                    '</div>'+
                                    '<div class="block-description">'+
                                        '<h6>The Last Breath</h6>'+
                                        '<div class="movie-time d-flex align-items-center my-2">'+
                                            '<span class="text-white">'+ data[index].time +'</span>'+
                                        '</div>'+
                                        '<div class="hover-buttons">'+
                                            '<span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>'+
                                                'Play Now'+
                                            '</span>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="block-social-info">'+
                                        '<ul class="list-inline p-0 m-0 music-play-lists">'+
                                            '<li><span><i class="ri-heart-fill"></i></span></li>'+
                                            '<li><span><i class="ri-add-line"></i></span></li>'+
                                        '</ul>'+
                                    '</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>';
                
            }

        }
    }

        var url = protocol + "//" + host + "/ajax/series/category/"+ id +"/"+this.min;

        this.min = this.min + 6;
        xhr.open("GET", url);
        xhr.responseType = "json";
        xhr.send();
};


function onClickViewEpisode(id) {
    var w = document.getElementById("load-data");
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.response;
                w.innerHTML = '<iframe class="embed-responsive-item" allowfullscreen="" src="'+ data.link  +'" frameborder="0" height="350px"></iframe>';

        }
    }

        var url = protocol + "//" + host + "/ajax/series/episode/"+ id;

        this.min = this.min + 6;
        xhr.open("GET", url);
        xhr.responseType = "json";
        xhr.send();
};


function onClickLoadEpisodes(saisonid, serieid) {
    var w = document.getElementById("load-episode");
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.response;
            w.innerHTML = '';
            for (let index = 0; index < this.response.length; index++) {
                w.innerHTML += '<div class="col-1-5 col-md-6 iq-mb-30">'+
                        '<div class="epi-box">'+
                           '<a href="#" data-toggle="modal" data-target="#exampleModal" onclick="onClickViewEpisode('+ data[index].id +')"></a>'+
                           '<div class="epi-img position-relative">'+
                              '<img src="'+ data[index].image +'" class="img-fluid img-zoom" alt="">'+
                              '<div class="episode-number">'+ (index+1) +'</div>'+
                              '<div class="episode-play-info">'+
                                 '<div class="episode-play">'+
                                    '<a href="#" data-toggle="modal" data-target="#exampleModal" onclick="onClickViewEpisode('+ data[index].id +')">'+
                                       '<i class="ri-play-fill"></i>'+
                                    '</a>'+
                                 '</div>'+
                              '</div>'+
                           '</div>'+
                           '<div class="epi-desc p-3">'+
                              '<div class="d-flex align-items-center justify-content-between">'+
                                 '<span class="text-primary">'+ data[index].time +'</span>'+
                              '</div>'+
                              '<a>'+
                                 '<h6 class="epi-name text-white mb-0">'+ data[index].name +'</h6>'+
                              '</a>'+
                           '</div>'+
                           '</a>'+
                        '</div>'+
                     '</div>';
                
            }

        }
    }

        var url = protocol + "//" + host + "/ajax/series/loadepisode/"+ saisonid +"/"+serieid;

        xhr.open("GET", url);
        xhr.responseType = "json";
        xhr.send();
};