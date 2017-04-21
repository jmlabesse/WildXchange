$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.button-collapse').sideNav({
            menuWidth: 300, // Default is 300
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
        }
    );

    $('.collapsible').collapsible();

// js for chips\tags
     $('.chips-autocomplete').material_chip({
        autocompleteOptions: {
            data: {
                'Apple': null,
                'Microsoft': null,
                'Google': null,
                'Javascript': null,
                'PHP': null,
                'JQuery': null,
                'Git': null,
                'Symfony': null,
                'AngularJS': null,
                'NodeJS': null,
                'CSS': null,
                'HTML': null,
                'Bootstrap': null,
                'Materialize': null,
                'Doctrine': null,
                'Sonata': null,
                'Apache': null,
                'Agile Development': null,
                'SCRUM': null
            },
            limit: Infinity,
            minLength: 1
        }
    });
    // js data object for tags
    var chip = {
        tag: 'chip content',
        image: '', //optional
        id: 1, //optional
    };
});
