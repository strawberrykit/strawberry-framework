strawberry.create('app',()=>{

    // Set pages if they require authorization or not
    // If not set here, then the page will default to FALSE
    var pages = {
        '/': false,
        '/index': false
    }

    // Requester object
    var requester = {
        isOnline:()=>{return null==localStorage.getItem("ractive")?"offline":localStorage.getItem("ractive")},

        // Gets the name of the page the requester is currently in
        onPage:()=>{return window.location.pathname.split('.')[0];},

        isAuthorized:()=>{
            let page = requester.onPage();
            if (pages.hasOwnProperty(page) && pages[page]){
                if (requester.isOnline()==='offline') {
                    return false;
                }
            }
            return true;
        }
    }

    if (!requester.isAuthorized()) {
        location.href='login.html';
    }

    // Set here how many seconds you'd like to page to appear
    setTimeout(()=>{
        document.getElementById('__strpage').style.display='block';
        document.getElementById('__strloader').style.display='none';
    },2000);

});

app.scope('main',($scope)=>{

    // Declaration for  all the components to be used in your project
    $scope.loader = '/components/loader.htm';

});
