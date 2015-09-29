var Singleton = (function() {
    var instance;

    function createInstance() {
      var object = new Object("I am the instance");
    }

    return {
      getInstance: function() {
        if(!instance) {
          instance = createInstance();
        }
        return instance;
      }
    }
})();


function run() {
  var instance1 = Singleton.getInstance();
  var instance2 = Singleton.getInstance();
  alert(instance1 === instance2);
}