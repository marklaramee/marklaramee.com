<?php 
    $activeNav = "tutorials";
    $title = "Fading Labels";
    include 'includes/pageTop.php'; 
?>
<h1>FADING LABELS</H1>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm">
        This tutorial will show you how to implement fading labels as used on my contact page. 
        The fields display a placeholder that appears to slide up when the user enters text. 
    </div>
  </div>


  <div class="row">
    <div class="col-sm">
      <h3>Example:</h3>
      <div class="fading-label">
        <input type="text" name="title" placeholder="Title" id="input-example" />
        <label for="title" >Title</label>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm">
      <p>
        What actually happens in this example is that the placeholder disappears and a label fades in over the field.
        You can see the full code at this <a class="demolink" target="_blank" href="https://jsfiddle.net/marklaramee/ckr1q895/">Js Fiddle</a>.
      </p>
    </div>
  </div>


  <div class="row">
    <div class="col-sm">
        The fading label requires the following HTML:
        <pre>
&lt;div class="fading-label"&gt;
    &lt;input type="text" name="title" placeholder="Title" /&gt;
    &lt;label for="title" >Title&lt;/label&gt;
&lt;/div&gt;
        </pre>
        <p>
          <a data-toggle="collapse" href="#fullCss" aria-expanded="false" aria-controls="fullCss" class="demolink">
            Click here
          </a> 
          to see the full css code.
          <div class="collapse" id="fullCss">
            <div class="card card-body">
              <pre>
.fading-label {
  position: relative; 
}

.fading-label input {
  box-sizing: border-box;
  display: inline-block;
  height: 40px;
  outline: none;
  padding-left: 12px; 
}

.fading-label textarea {
  padding-left: 12px; 
}

.fading-label input:focus {
  padding-top: 12px; 
}

.fading-label textarea:focus {
  padding-top: 16px; 
}

.fading-label input:focus + label 
{
  opacity: 1;
  top: 3px;
  -webkit-transition: 0.25s;
  -o-transition: 0.25s;
  transition: 0.25s;
}

.fading-label input::-webkit-input-placeholder {
  color: #777; 
}

.fading-label input:-moz-placeholder {
  color: #777; 
}

.fading-label input:-ms-input-placeholder {
  color: #777; 
}

.fading-label input:focus::-webkit-input-placeholder {
  color: #fff; 
}

.fading-label input:focus:-moz-placeholder {
  color: #fff; 
}

.fading-label input:focus::-moz-placeholder {
  color: #fff; 
}

.fading-label input:focus:-ms-input-placeholder {
  color: #fff; 
}

.fading-label label 
{
  color: #9ca7ab;
  font-size: 12px;
  font-weight: 400;
  left: 7px;
  margin-left: 7px;
  opacity: 0;
  position: absolute;
  top: 7px;
}
              </pre>
            </div>
          </div>
        </p>
    </div>
  </div>


  <div class="row">
    <div class="col-sm">
      <p><h3>CSS Explanation:</h3></p>
        Set the containing div to have position: relative so that items can be absolutely positioned inside it.
        <pre>
.fading-label {
    position: relative;
    ...
        </pre>

        It's important to set the height of your input field so that it won't shrink or expand as we show and hide items.
        Set the box-sizing property to border-box so that padding and margin changes will have no effect on the height of the field.
        <pre>
input {
    box-sizing: border-box;
    height: 45px;
    ...
        </pre>

        Set the label's position properties so that it overlays the text field. 
        I had to use the margin-left and left properties together so that the input text would display correctly below the label.
        <pre>
label {
    ...
    left: 7px;
    margin-left: 7px;
    position: absolute;
    top: 7px;
    ...
        </pre>

        Set the opacity of the label to 0 so that I can use a fade in animation.
        <pre>
label {
    ...
    opacity: 0;
    ...
        </pre>
    </div>
  </div>


  <div class="row">
    <div class="col-sm">
        <p>When the user clicks into the field, a few things happen</p>
        1) We set the placeholder color to the background color of the field (making it invisible). 
        We use both the <span class="codetext">focus</span> pseudoclass with the <span class="codetext">placeholder</span> pseudo element
        <pre>
input:focus::-webkit-input-placeholder {
	color: #fff;
        </pre>

        2) We set the label's opacity to 1. We'll also set the top value to raise it up. 
        We'll use a transition to give all these values some animation. 
        We use the "+" operator to target labels immediately following the input field.
        <pre>
input:focus + label {
    opacity: 1;
    top: 3px;
    transition: 0.25s;
        </pre>

        3) We'll also add some padding to the top of the field so that the text being inputted doesn't interfere with the label
        <pre>
input:focus {
    padding-top: 12px;
  }
        </pre>

        <p>
          Note: this code uses uses a non-standard pseudo element called "<span class="codetext">::placeholder</span>". 
          Due to that, it will require some vendor prefixes. 
          For demonstration purposes, I used <span class="codetext">::-webkit-input-placeholder</span>; 
          although, to fully implement it you'll need to also add the <span class="codetext">:-moz-placeholder</span>, 
          <span class="codetext">::-moz-placeholder</span> and <span class="codetext">:-ms-input-placeholder</span> pseudo classes.
        </p>
        <p>
          Please see the <a class="demolink" target="_blank" href="https://jsfiddle.net/marklaramee/ckr1q895/">Js Fiddle</a> for the full code.
        </p>
      </div>
    </div>
</div>

<?php include 'includes/pageBottom.php'; ?>