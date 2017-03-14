# mibew-operator-status-plugin
Plugin for Mibew, get statement based on the availability of operators.

# Useage

Request `<MIBEW-BASE-URL>/opstatus/<OPERATOR-CODE>`, your will get `true` when operator
is online or `false` when operator is offline.

# Install

1. Get the archive with the plugin sources from [release page](https://github.com/everyx/mibew-operator-status-plugin/releases):

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

# License

[MIT](LICENSE)
