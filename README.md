# Mibew Operator Status plugin
Plugin for Mibew, get statement based on the availability of operators.

# Usage

1. Get any operators online status:
 
    * request URL: `<MIBEW-BASE-URL>/opstatus`.
    * return `true` when any operators is online and `false` when not.

2. Get any operators online status in specificed group:

    * request URL: `<MIBEW-BASE-URL>/opstatus/group/<GROUP-ID>`.
    * return `true` when any operators in this group is online and `false` when not.

3. Get an operator online status by operator code:

    * Request URL: `<MIBEW-BASE-URL>/opstatus/<OPERATOR-CODE>`.
    * return `true` when operator is online or `false` when not.

4. Use callback parameter:

    Just insert `<script>` tag and set `src` to URL above and add `callback` parameter
    
    * `<MIBEW-BASE-URL>/opstatus?callback=<CALLBACK_FUNCTION>`
    * `<MIBEW-BASE-URL>/opstatus/<OPERATOR-CODE>?callback=<CALLBACK_FUNCTION>`
    
    will return bellow and run `CALLBACK_FUNCTION` automatically.

    ```javascript
    /**/CALLBACK_FUNCTION(status);
    ```

# Install

1. Get the archive with the plugin sources. You can download it from the [official site](https://mibew.org/plugins#mibew-operator-status) or build the plugin from sources.

2. Untar/unzip the plugin's archive.

3. Put files of the plugins to the `<MIBEW-ROOT>/plugins` folder.

4. Navigate to `<MIBEW-BASE-URL>/operator/plugin` page and enable the plugin.

**Tips**: if you plugin state is "not initialized", please check `<MIBEW-ROOT>/configs/config.yml` file is not:

```yml
...
plugins: []
...
```
and should be like this:

```yml
...
plugins:
    "SomePlugin":
        key: value
...
```

# Build from sources

1. Obtain a copy of the repository using `git clone`, download button, or another way.
2. Install [node.js](http://nodejs.org/) and [npm](https://www.npmjs.org/).
3. Install [Gulp](http://gulpjs.com/).
4. Install npm dependencies using `npm install`.
5. Run Gulp to build the sources using `gulp default`.

Finally `.tar.gz` and `.zip` archives of the ready-to-use Plugin will be available in release directory.

# License

[MIT](LICENSE)
