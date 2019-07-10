// connection string
var url = "mongodb://localhost:27017/local";

co( function* () {
    const mongo = yield MongoClient.connect(url);
    console.log('connect to mongo server');

    yield insertDocuments(mogon, null);

    db.close();
}).catch( err => console.log(err) );

var insertDocuments = function (db, callback) {
    return co(function* () {
        const result = yield db.collection('restaurants')
        .insertMany([
            {
              "name": "Sun Bakery Trattoria",
              "stars": 4,
              "categories": [
                "Pizza", "Pasta", "Italian", "Coffee", "Sandwiches"
              ]
            }, {
              "name": "Blue Bagels Grill",
              "stars": 3,
              "categories":[
                "Bagels", "Cookies", "Sandwiches"
              ]
            }, {
              "name": "Hot Bakery Cafe",
              "stars": 4,
              "categories": [
                "Bakery", "Cafe", "Coffee", "Dessert"
              ]
            }
          ]);

          console.log(result);
          return result;
    });
};
