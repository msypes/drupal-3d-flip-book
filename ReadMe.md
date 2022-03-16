#3D Flipbook Field

##Background
This module is designed to display PDF files as a flipbook using the commercial Javascript library 3D FlipBook ([https://3dflipbook.net/](https://3dflipbook.net/)), and requires a purchase of that software.

It works by creating a field formatter designed for file fields, either traditional node fields or media entities

##Installation
Install this module in your `modules` directory or subdirectory thereof.

Put your copy of the commercial Javascript library in the `3d-flip-book` subdirectory of this module. The structure should look something like this:

```
3d-flip-book
|- css
|  |- black-book-view.css, etc.
|- fonts
|  |- FontAwesome.otf, etc.
|- images
|  |- dark-loader.gif, light-loader.gif
|- index.html
|- index.js
|- js
   |- pdf.worker.js, etc.
|- sounds
|  |- end-flip.mp3, start-flip.mp3
|- templates
|  |- default-book-view.html, search-book-view.html
```

You don't necessarily need _every_ file from the library to run on your site. (The other files are for advanced customizations. The above is essentially a minimal install.) See `3dflipbook_field_theme()` in the `.module` file, and `templates/3d-flipbook.html.twig` to get an idea of what's required.

##Use In Practice
Enable the module as you would any other.

Create a file field, _e.g._, either directly on a node, or on a media entity.

* Limit it to only accepting PDFs, as that's all that this module is currently designed to accept.
* Under the "Manage Display" tab for your entity type, the field you created should now have a "PDF 3DFlipbook" Format option. Select that for the Default display (or whatever custom display you're using) and save. 
* If you use a media entity, as I have, the parent node content type should be set to display the media reference field as "Rendered Entity."

That's it!

Create an entity, _e.g._, a page with the file field or media with a file field, and upload a PDF to the field. The display or your content should include the flipbook.

##CSS/Styling

I found it best to target `.pdf-flipbook .field--item` for custom CSS.

You'll likely need to play with the height. I found using `vh` the best option.

I also found it advantageous to set off the fipbook area with a `border`, `box-shadow`, and/or contrasting `background-color`, as scrolling over the area will affect the zoom, which may not be what your viewers were looking for.