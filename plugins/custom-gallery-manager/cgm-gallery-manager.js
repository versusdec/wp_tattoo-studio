$(document).ready(function($) {
  $('#cgm_upload_gallery_images').click(function(e) {
    e.preventDefault();
    
    const galleryImages = $('#cgm_gallery_images-input').val();
    const galleryImagesArray = galleryImages ? galleryImages.split(',') : [];
    
    const frame = wp.media({
      title: 'Select Gallery Images',
      multiple: true,
      library: { type: 'image' },
      button: { text: 'Add to Gallery' }
    });
    
    frame.on('select', function() {
      const attachments = frame.state().get('selection').toJSON();
      attachments.forEach(function(attachment) {
        galleryImagesArray.push(attachment.id);
        
        $('#cgm_gallery_images_preview').append('<div class="cgm-gallery-image" data-id="' + attachment.id + '">' +
          '<img src="' + attachment.url + '" style="max-width: 100px; margin: 5px;">' +
          '<button type="button" class="cgm-remove-image">Remove</button>' +
          '</div>');
      });
      
      $('#cgm_gallery_images-input').val(galleryImagesArray.join(','));
    });
    
    frame.open();
  });
  
  $(document).on('click', '.cgm-remove-image', function() {
    const imageElement = $(this).closest('.cgm-gallery-image');
    const imageId = imageElement.data('id');
    let galleryImages = $('#cgm_gallery_images-input').val().split(',');
    
    galleryImages = galleryImages.filter(function(id) {
      return id !== String(imageId);
    });
    
    $('#cgm_gallery_images-input').val(galleryImages.join(','));
    
    imageElement.remove();
  });
  
  if ($('#cgm_gallery_images-input').val() !== '') {
    const galleryImages = $('#cgm_gallery_images-input').val().split(',');
    galleryImages.forEach(function(imageId) {
      const imageUrl = wp_get_attachment_url(imageId);
      if (imageUrl) {
        $('#cgm_gallery_images_preview').append('<div class="cgm-gallery-image" data-id="' + imageId + '">' +
          '<img src="' + imageUrl + '" style="max-width: 100px; margin: 5px;">' +
          '<button type="button" class="cgm-remove-image">Remove</button>' +
          '</div>');
      }
    });
  }
});
