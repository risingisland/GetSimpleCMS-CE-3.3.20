CKEDITOR.stylesSet.add('mystyles', [
	// Add the following in gsconfig.php
	// styleSET : "some/location/mystyles.js"
	
    { name: 'Introduction', element: 'p', attributes: { 'class': 'introduction'} },

    { name: 'Link button', element: 'a', attributes: { 'class': 'button' } },
    { name: 'Highlight', element: 'span', attributes: { 'class': 'highlight' } },

	{ name: 'Left Aligned Photo', element: 'img', attributes: { 'class': 'align_left' } },
    { name: 'Right Aligned Photo', element: 'img', attributes: { 'class': 'align_right' } },
    { name: 'Centered Photo', element: 'img', attributes: { 'class': 'align_center' } }, 
	
    { name: 'Stretch', element: 'img', attributes: { 'class': 'stretch' } },
	{ name: 'Summary', element: 'p', attributes: {'class': 'summary'} }
	
	// Block-level styles.
    { name: 'Blue Title', element: 'h2', styles: { color: 'Blue' } },
    { name: 'Red Title',  element: 'h3', styles: { color: 'Red' } },

    // Inline styles.
    { name: 'CSS Style', element: 'span', attributes: { 'class': 'my_style' } },
    { name: 'Marker: Yellow', element: 'span', styles: { 'background-color': 'Yellow' } }
]);