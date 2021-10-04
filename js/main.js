window.onload = function onLoad() {

  //HTML
  var bar = new ProgressBar.Circle(container, {
    color: '#FFEA82',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 4,
    trailWidth: 1,
    easing: 'easeInOut',
    duration: 4500,
    text: {
      autoStyleContainer: false
    },
    from: { color: '#FFEA82', width: 1 },
    to: { color: '#f24530', width: 4 },
    // Set default step function for all animate calls
    step: function (state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100);
      if (value === 0) {
        circle.setText('');
      } else {
        circle.setText(value);
      }

    }
  });
  bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
  bar.text.style.fontSize = '2rem';
  bar.text.style.color = '#f24530';

  bar.animate(0.75);  // Number from 0.0 to 1.0

  //PHP

  var bar2 = new ProgressBar.Circle(containerPhp, {
    color: '#FFEA82',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 4,
    trailWidth: 1,
    easing: 'easeInOut',
    duration: 4500,
    text: {
      autoStyleContainer: false
    },
    from: { color: '#FFEA82', width: 1 },
    to: { color: '#4e89e8', width: 4 },
    // Set default step function for all animate calls
    step: function (state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100);
      if (value === 0) {
        circle.setText('');
      } else {
        circle.setText(value);
      }

    }
  });
  bar2.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
  bar2.text.style.fontSize = '2rem';
  bar2.text.style.color = '#4e89e8';

  bar2.animate(0.65);  // Number from 0.0 to 1.0


  //JS

  var bar4 = new ProgressBar.Circle(containerJs, {
    color: '#FFEA82',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 4,
    trailWidth: 1,
    easing: 'easeInOut',
    duration: 4500,
    text: {
      autoStyleContainer: false
    },
    from: { color: '#FFEA82', width: 1 },
    to: { color: '#FF4747', width: 4 },
    // Set default step function for all animate calls
    step: function (state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100);
      if (value === 0) {
        circle.setText('');
      } else {
        circle.setText(value);
      }

    }
  });
  bar4.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
  bar4.text.style.fontSize = '2rem';
  bar4.text.style.color = '#FF4747';

  bar4.animate(0.60);  // Number from 0.0 to 1.0


  //PL/SQL

  var bar3 = new ProgressBar.Circle(containerLaravel, {
    color: '#FFEA82',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 4,
    trailWidth: 1,
    easing: 'easeInOut',
    duration: 4500,
    text: {
      autoStyleContainer: false
    },
    from: { color: '#FFEA82', width: 1 },
    to: { color: '#efd215', width: 4 },
    // Set default step function for all animate calls
    step: function (state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100);
      if (value === 0) {
        circle.setText('');
      } else {
        circle.setText(value);
      }

    }
  });
  bar3.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
  bar3.text.style.fontSize = '2rem';
  bar3.text.style.color = '#efd215';

  bar3.animate(0.60);  // Number from 0.0 to 1.0

  //GIT

  var bar6 = new ProgressBar.Circle(containerWP, {
    color: '#FFEA82',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 4,
    trailWidth: 1,
    easing: 'easeInOut',
    duration: 4500,
    text: {
      autoStyleContainer: false
    },
    from: { color: '#FFEA82', width: 1 },
    to: { color: '#00A7DA', width: 4 },
    // Set default step function for all animate calls
    step: function (state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100);
      if (value === 0) {
        circle.setText('');
      } else {
        circle.setText(value);
      }

    }
  });
  bar6.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
  bar6.text.style.fontSize = '2rem';
  bar6.text.style.color = '#00A7DA';

  bar6.animate(0.70);  // Number from 0.0 to 1.0


  //AGILE

  var bar5 = new ProgressBar.Circle(containerShopify, {
    color: '#FFEA82',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 4,
    trailWidth: 1,
    easing: 'easeInOut',
    duration: 4500,
    text: {
      autoStyleContainer: false
    },
    from: { color: '#FFEA82', width: 1 },
    to: { color: '#169E5C', width: 4 },
    // Set default step function for all animate calls
    step: function (state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100);
      if (value === 0) {
        circle.setText('');
      } else {
        circle.setText(value);
      }

    }
  });
  bar5.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
  bar5.text.style.fontSize = '2rem';
  bar5.text.style.color = '#169E5C';

  bar5.animate(0.75);  // Number from 0.0 to 1.0


};