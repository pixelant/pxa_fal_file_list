# Fal file list
## Extension key - "pxa_fal_file_list"
Show folder files list on FE

Simple extension that allow to choose folder in plugin settings and list files on FE.

## How to use it
- Install extension in extension manager
- Include static TS template
- Insert plugin "Files list" on content page

## Plugin settings

- Folder
- Sorting field
- Sorting direction
- New for duration of days (How many days file is marked as new)

## Typoscript configuration

If extension `fal_securedownload` is installed, it is possible to enable file group check for frontend file listing by setting `enableFileGroupCheck = 1`.


```
plugin.tx_pxafalfilelist {
    settings {
        # Requires extension fal_securedownload
        enableFileGroupCheck = 1
    }
}
```
