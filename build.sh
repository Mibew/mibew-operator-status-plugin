#!/bin/bash

plugin_root_dir='Everyx'
plugin_target_dir="$plugin_root_dir/Mibew/Plugin/OperatorStatus"
mkdir -p $plugin_target_dir
cp -R src/* $plugin_target_dir
tar -czvf archive/mibew-operator-status-plugin.tar.gz $plugin_root_dir
zip -r archive/mibew-operator-status-plugin.zip $plugin_root_dir
rm -rf $plugin_root_dir
