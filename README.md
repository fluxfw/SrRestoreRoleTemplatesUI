# SrRestoreRoleTemplatesUI ILIAS Plugin

Manually reapply didactic or role templates per object

This project is licensed under the GPL-3.0-only license

## Requirements

* ILIAS 6.0 - 7.999
* PHP >=7.2

## Installation

Start at your ILIAS root directory

```bash
mkdir -p Customizing/global/plugins/Services/UIComponent/UserInterfaceHook
cd Customizing/global/plugins/Services/UIComponent/UserInterfaceHook
git clone https://github.com/fluxfw/SrRestoreRoleTemplatesUI.git SrRestoreRoleTemplatesUI
```

Update, activate and config the plugin in the ILIAS Plugin Administration

## Description

### Base plugin

First you need to install the [SrRestoreRoleTemplates](https://github.com/fluxfw/SrRestoreRoleTemplates) plugin

You can disable its cron jobs if you don't wish it

### Permissions tab

You will find the plugin in the permissions tab for all object types

![Tab permissions](./doc/images/tab_permissions.png)

### Settings tab

For some core object types (Categories, courses, folders and groups), you will find it in the settings tab too

![Tab settings](./doc/images/tab_settings.png)

### Actions

You can run the actions from there

The 'Only objects created after' config does not affect here

Note: Reapply role templates is only available for courses

![UI](./doc/images/ui.png)
