# wp-all-import-resize-images-on-upload
Resize images that are uploaded using wp all import plugin for wordpress. 

Place the code into your functions.php in order to resize all of the images that are being uploaded using wp-all-import. 

The images will be resized while keeping the aspect ratio, and will be added with an white background. 

This is usefull if you are using wp-all-import wordpress plugin to import products from .XML or .CSV file and you want all products to have same size of product image.. 

You can change the dimensions of the resize inside the code, with changing the following variable:
$square;

*NOTE: In order the code to work you have to have installed and configured WP-CLI on your server. If you don't have it, the images will be resized but you will have to manualy regenerate all the thumbnails in order for them to show as resized. (you can use Regenerate thumbnails plugin if you don't feel comfortable, using wp-cli.)
