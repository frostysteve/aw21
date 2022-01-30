function openPane(url, push) {
    $('.project').addClass('show');
    $('body').addClass('no-scroll');
  
    $.get(url, function(html) {
      var $html = $('<div />').append(html)
      var title = $html.find('title').text()
      if(push) history.pushState({pane: true}, title, url)
      document.title = title
      $('.project-content').html($html.find('.project-content).html())
      afterLoadPane()
  
      if('ga' in window) {
        ga('set', document.location.pathname)
        ga('send', 'pageview')
      }
    })
  
    setTimeout(function() {
      $('body').addClass('content-pane-open')
    }, 750)
  }
  
  function closePane(push) {
    $('.project').removeClass('show').find('.content-fixed').remove()
    $('body').removeClass('content-pane-open')
    $('body').removeClass('no-scroll')
    document.title = 'Alan Weedon'
    $(window).trigger('pane-closed')
    setTimeout(function() {
      $('.project-content').html('')
    }, 750)
    if(push) {
      history.pushState(null, document.title, window.home)
      if('ga' in window) {
        ga('set', document.location.pathname)
        ga('send', 'pageview')
      }
    }
  }

  $('body').on('click', 'a.content-pane-trigger', function(event) {
    event.preventDefault()
    var url = this.href

    openPane(url, true)
  })

  $('.content-pane-close').on('click', function() {
    closePane(true)
  })

  $('.content-pane-close').on('click', function() {
    closePane(true)
  })

  