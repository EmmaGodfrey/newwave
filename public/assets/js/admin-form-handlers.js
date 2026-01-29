/**
 * Admin Form Handlers
 * Handles loading states and button disabling for all admin forms
 */

(function($) {
    'use strict';

    // Form submission handler
    function handleFormSubmit() {
        $('form').on('submit', function(e) {
            const $form = $(this);
            const $submitBtn = $form.find('button[type="submit"]');
            
            // Skip if already processing
            if ($submitBtn.prop('disabled')) {
                e.preventDefault();
                return false;
            }

            // Store original button text
            const originalText = $submitBtn.html();
            $submitBtn.data('original-text', originalText);

            // Disable button and show loading state
            $submitBtn.prop('disabled', true);
            
            // Add spinner based on button content
            if ($submitBtn.find('i').length > 0) {
                // If button has icon, replace it with spinner
                $submitBtn.find('i').removeClass().addClass('spinner-border spinner-border-sm me-1');
            } else {
                // Otherwise prepend spinner
                $submitBtn.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>' + originalText);
            }

            // Add loading class
            $submitBtn.addClass('btn-loading');

            // Re-enable after 10 seconds as failsafe
            setTimeout(function() {
                $submitBtn.prop('disabled', false);
                $submitBtn.html(originalText);
                $submitBtn.removeClass('btn-loading');
            }, 10000);
        });
    }

    // Delete button handler
    function handleDeleteButtons() {
        // Handle delete-btn class (DataTables with data attributes)
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            const $btn = $(this);
            const id = $btn.data('id');
            const name = $btn.data('name') || 'this item';
            const url = $btn.data('url');
            
            if (url) {
                confirmDelete(id, name, url);
            }
        });

        // Handle delete-item class (legacy with href)
        $(document).on('click', '.delete-item', function(e) {
            e.preventDefault();
            const $btn = $(this);
            const url = $btn.attr('href');
            const itemName = $btn.data('name') || 'this item';

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete ${itemName}. This action cannot be undone!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        }
                    }).then(response => {
                        return response;
                    }).catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error.responseJSON?.message || error.statusText}`
                        );
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Item has been deleted successfully.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        // Reload page or update DataTable
                        if ($.fn.DataTable && $.fn.DataTable.isDataTable('table')) {
                            $('table').DataTable().ajax.reload();
                        } else {
                            location.reload();
                        }
                    });
                }
            });
        });
    }

    // DataTable delete confirmation handler (for inline delete buttons)
    window.confirmDelete = function(id, name, customUrl) {
        const itemName = name || 'this item';
        
        // Use the provided URL
        const deleteUrl = customUrl;
        
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete "${itemName}". This action cannot be undone!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    }
                }).then(response => {
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(
                        `Request failed: ${error.responseJSON?.message || error.statusText}`
                    );
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Item has been deleted successfully.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    // Reload DataTable if it exists, otherwise reload page
                    if ($.fn.DataTable && $('.dataTable').length) {
                        $('.dataTable').DataTable().ajax.reload();
                    } else {
                        location.reload();
                    }
                });
            }
        });
        return false;
    };

    // Ajax link handler with loading state
    function handleAjaxLinks() {
        $(document).on('click', '[data-ajax-action]', function(e) {
            e.preventDefault();
            const $link = $(this);
            const url = $link.attr('href') || $link.data('url');
            const method = $link.data('method') || 'GET';
            const confirm = $link.data('confirm');

            const performAction = () => {
                // Disable link and show loading
                $link.prop('disabled', true).addClass('disabled');
                const originalHtml = $link.html();
                
                if ($link.find('i').length > 0) {
                    $link.find('i').removeClass().addClass('spinner-border spinner-border-sm');
                } else {
                    $link.html('<span class="spinner-border spinner-border-sm me-1"></span>' + originalHtml);
                }

                $.ajax({
                    url: url,
                    type: method,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.message) {
                            toastr.success(response.message);
                        }
                        // Reload DataTable or page
                        if ($.fn.DataTable && $.fn.DataTable.isDataTable('table')) {
                            $('table').DataTable().ajax.reload();
                        } else {
                            setTimeout(() => location.reload(), 500);
                        }
                    },
                    error: function(xhr) {
                        const message = xhr.responseJSON?.message || 'An error occurred';
                        toastr.error(message);
                        $link.prop('disabled', false).removeClass('disabled');
                        $link.html(originalHtml);
                    }
                });
            };

            if (confirm) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: confirm,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        performAction();
                    }
                });
            } else {
                performAction();
            }
        });
    }

    // Initialize on document ready
    $(document).ready(function() {
        handleFormSubmit();
        handleDeleteButtons();
        handleAjaxLinks();

        // Prevent double submission with Enter key
        $('form input').on('keypress', function(e) {
            if (e.which === 13 && !$(this).is('textarea')) {
                const $form = $(this).closest('form');
                const $submitBtn = $form.find('button[type="submit"]');
                if ($submitBtn.prop('disabled')) {
                    e.preventDefault();
                    return false;
                }
            }
        });

        // Reset form buttons on page show (for back button)
        $(window).on('pageshow', function(event) {
            if (event.originalEvent.persisted) {
                $('button[type="submit"]').each(function() {
                    const $btn = $(this);
                    const originalText = $btn.data('original-text');
                    if (originalText) {
                        $btn.html(originalText);
                        $btn.prop('disabled', false);
                        $btn.removeClass('btn-loading');
                    }
                });
            }
        });
    });

})(jQuery);
