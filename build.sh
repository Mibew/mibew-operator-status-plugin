#!/bin/bash

author='Everyx'

tmp_dir='/tmp'
working_dir=`echo $PWD`

target_dir="$tmp_dir/$author/Mibew/Plugin/OperatorStatus"
mkdir -p $target_dir

shopt -s extglob
cp -R !(*.sh) $target_dir
shopt -u extglob

version=`cat Plugin.php|grep -Po "(?<=return ')(\d.){2}\d{1}"`

cd $tmp_dir

tar -czvf $working_dir/mibew-operator-status-plugin.$version.tar.gz $author
zip -r $working_dir/mibew-operator-status-plugin.$version.zip $author

rm -rf $plugin_root_dir
