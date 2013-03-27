$(document).ready(function(){

	/**
	* UI interaction
	*/
	var info = $('#info'),
		text = $('#explicit'),
		list = $('#list');

	info.on('swipeleft swiperight',function(event){  
	    if (event.type == 'swipeleft') {             
	       $.mobile.changePage(text, {transition: 'slide', reverse: false});
	    };
	    if (event.type == 'swiperight') {            
	       $.mobile.changePage(list, {transition: 'slide', reverse: true});  
	    };
	});

	list.on('swipeleft',function(event){  
	    $.mobile.changePage(info, {transition: 'slide', reverse: false});  
	});

	text.on('swiperight',function(event){  
	    $.mobile.changePage(info, {transition: 'slide', reverse: true});  
	});

	$('#btnAll').on('click',function(){
		$(this).toggleClass('open');
		if ($(this).hasClass('open')){
			$('#dropDlist').slideDown();
		}else{
			$('#dropDlist').slideUp();
		}
	});
});

(function() {

	var ikki = {
		config: {
			radius: 2000,
			locale: 'fr',
			latitude: '',
			longitude: '',
			articleWrapper: $('div#quick-article'),
			listWrapper: $('#articles'),
			buttonWrapper: $('#buttonWrapper'),
			//placeType possibilities: isle, city, landmark, railwaystation,
			placeType: ''
		},
		pois: [],
		currentID: null,

		/**
		 * Load options & Init the ikki object
		 * @param array config
		 */
		init: function (config) {
			$.extend(this.config, config);
			this.getLocation.call();
		},

		/**
		 * Get the current location w/ geolocation
		 */
		getLocation: function() {
			if(navigator.geolocation) {
				navigator.geolocation.getCurrentPosition( ikki.setLocation );
			} else {
				$('#support').html("Geolocation is not supported by this browser.");
			}
		},

		/**
		 * Set the location variables
		 */
		setLocation: function(position) {
			var config = ikki.config;
			config.latitude = position.coords.latitude;
			config.longitude = position.coords.longitude;
			ikki.getWikiLocation(config.latitude, config.longitude);
		},

		/**
		 * Query the Wiki API & get close locations
		 * @param  {int} latitude
		 * @param  {int} longitude
		 */
		getWikiLocation: function(latitude, longitude) {
			var config = ikki.config;

			$.getJSON('http://api.wikilocation.org/articles?lat=' + config.latitude + '&lng=' + config.longitude + '&radius=' + config.radius + 'limit=50&locale=' + config.locale + '&format=json&jsonp=?',
				function(data){
					ikki.getPOIs(data);
				}
			);
		},

		/**
		 * Get Points of Interest
		 * @param  {obj} data
		 */
		getPOIs: function(data) {
			var placeType = this.config.placeType;

			for(var i=0 ; i < data.articles.length ; i++){
				var d = data.articles[i];

				if( placeType !== '' && data.articles[i].type !== '' ) {
					if( data.articles[i].type == placeType ) {
						this.pois.push(d);
					}
				} else if( placeType === '' && data.articles[i].type !== '' ) {
					this.pois.push(d);
				}
			}
			ikki.listPOIs();
			ikki.downloadClosest();
			ikki.postToDb();
		},

		/**
		 * Make a list with the point of interests
		 */
		listPOIs: function() {
			var toAppend = '<ul id="main-list">',
				pois = this.pois;
			for (var i=0 ; i < pois.length ; i++){
				toAppend += '<li class="'+pois[i].type+'">';
				toAppend += '<div class="wrapper">';
				toAppend += '<a href="#" data-id="'+pois[i].id+'" data-url="'+pois[i].url+'" class="list">';
				toAppend += '<img src="">';
				toAppend += '<p class="title">'+pois[i].title+'</p></a>';
				toAppend += '<div class="meta">';
				toAppend += '<a class="likes">200</a>';
				toAppend += '<a class="new-like"></a>';
				toAppend += '<p class="distance">'+pois[i].distance+'</p>';
				toAppend += '</div></div></li>';
			}
			toAppend += '</ul>';

			$('#list').append(toAppend);

			$('.list').click(function(e) {
				e.preventDefault();
				var url = $(this).data('url'),
					title = $(this).html();
				this.currentID = $(this).data('id');
				ikki.downloadPage(url, title);
				$.mobile.changePage($('#info'), {transition: 'slide', reverse: false});
			});
		},

		/**
		* Download the closest POI to display by default
		*/
		downloadClosest: function() {
			var url = this.pois[0].url,
				title = this.pois[0].title;
			this.currentID = this.pois[0].id;
			if( url ) {
				ikki.downloadPage(url, title);
			}
			this.likeIt();
		},

		/**
		 * Download the given page
		 * @param {str} url
		 * @param {str} title 
		 */
		downloadPage: function(url, title) {
			var articleWrapper = this.config.articleWrapper;
			$.post("assets/php/download_page.php", { "url": url }, function(data){
				articleWrapper.html(data);
				$('#quick-title').html(title);
			});
		},

		postToDb: function() {
			var locations = this.pois;
			$.post("assets/php/add_locations_to_db.php", { "locations": locations }, function(data){
				console.log(data);
			});
		},

		likeIt: function() {
			var loc_id = this.pois[0].id;
			$('.btn-success').on('click', function(e) {
				$.post("assets/php/likeIt.php", { "loc_id": loc_id }, function(data){
					console.log(data);
				});
			});
		}
	};

	// Start things off, options possible
	ikki.init({

	});

})();



