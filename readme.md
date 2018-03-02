## Sadat - Vue.js WordPress Theme
Sadat A Single Page WordPress Starter Theme that build with Vue JS and WordPress Rest API. Say goodbye to page loading. Super fast loading speed which always loved by audiences. Single-Page Applications are Web apps that load a single HTML page and dynamically update that page as the user interacts with the app. JavaScript frameworks like AngularJS, Ember.js, Meteor.js, ExtJS and React have adopted SPA principles.
![Vue.js WordPress Theme](https://jeweltheme.com/wp-content/uploads/2018/03/Vuejs-WordPress-Theme.jpg)

**Features at a glance:**

 - **[Vue.js](https://vuejs.org)**: One of the progressive Javascript open source Framework. It's easy to handle Web Apps based on Javascript with Vue.
 - **[Moment.js](https://momentjs.com/) Integrated**: Moment.js is a Javascript Plugin that collaborate to display Dates and Times.
 - **[Vue Resource](https://github.com/pagekit/vue-resource)**: It's a plugin made for a special purpose for Vue. It will become your supporter for making web requests using a XMLHttpRequest.
 - **[Vue Router](https://router.vuejs.org/en/)**: This plugin handle all component for Vue JS. In Sadat Theme we have build several component like Header, Footer, Post, Page, Author. It accomplished the SPA (Single Page Application) for Vue.
 - **[Babel](https://babeljs.io/)**: Babel is a Javascript compiler. In brief, it allows you to use language features “*from the future*”.
 *For example we can take a look at the following function:*

    let myFunction = () => {
    console.log("This Theme is awesome!");
    };

the function above would get compiled to:

    var myFunction = function() {
    console.log("This Theme is awesome!");
    };

 - **Webpack**: [Webpack](https://webpack.js.org/) is an Open Source static module bundler. It takes [modules](https://webpack.js.org/concepts/modules/) from dependencies and bundles all static assets those representing those modules. The main reason for using Webpack is modular approach for Developers building any Web Applications.

While webpack process Developed App, builds a dependency graph that includes every module for application needs. It has four core [concepts](https://webpack.js.org/concepts/):

 1. Entry
 2. Output
 3. Loaders
 4. Plugins

This bundler used command line and the configuration filename webpack.config.js.

[Node.js](https://nodejs.org/) is required for Installing Webpack. Webpack can be extensible by use of loaders. Using loaders allow developers to write their own custom tasks when they want to perform bundling files together.

### You’ll find a filename package.json
Webpack build file command is npm run build or yarn run build

    “scripts”: {
    //npm run build to build production bundles
    “build”: “webpack --config webpack.config.prod.js”,
    //npm run dev to generate development bundles and run dev.server
    “dev”: “webpack-dev-server”
    }

Learn more about [Webpack Configuration](https://medium.com/@rajaraodv/webpack-the-confusing-parts-58712f8fcad9) and features.

 - **REST API**: REST stands for [Representational State Transfer](https://en.wikipedia.org/wiki/Representational_state_transfer). It’s a way of methodology let programs talk to each other.

Take a look WordPress’s declaration about JSON and WordPress REST API

>  The WordPress REST API provides API endpoints for WordPress data
> types that allow developers to interact with sites remotely by sending
> and receiving [JSON](https://en.wikipedia.org/wiki/JSON) (JavaScript
> Object Notation) objects. JSON is an open standard data format that is
> lightweight and human-readable, and looks like Objects do in
> JavaScript; hence the name. When you send content to or make a request
> to the API, the response will be returned in JSON. This enables
> developers to create, read and update WordPress content from
> client-side JavaScript or from external applications, even those
> written in languages beyond PHP.

### REST API has four five Concepts:

 1. Routes/Endpoints
 2. Requests
 3. Responses
 4. Schema
 5. Controller Classes

**REST API Endpoint References for Developers**

The REST API allows data can be accessible publicly for any client who is anonymous. You can retrieve private data also by [authentication](https://developer.wordpress.org/rest-api/using-the-rest-api/authentication/).

Endpoints are: Posts, Post Revisions, Categories, Tags, Pages, Comments, Media, Taxonomies, Users, Post Types, Post Statuses, Settings etc.

**Details about Single Page Application**

SPA getting popularity for both backend and front end Development. [Basix Admin](https://themeforest.net/item/basix-admin-vuejs-bootstrap-admin-dashboard-template/20838455) is a great example for SPA Backend Development [demo](http://vuejsadmin.com/). In Single Page App all visual page or item managed with components. Vue Router manage all of the components. The system loads all data at the first time. Than it’s just grab components and preview it on browser.

**Getting started:** It's easy to get started with the Starter Theme. Download the Zip Package and install it regular basis.

**Installation Guide**: Go to Website Dashboard>Appearance>Themes>Add New>Upload the Zip Package.