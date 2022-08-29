<style>
	.header1 {
  overflow: hidden;
  background-color: #2c3136;
  padding: 20px 10px;
}

/* Style the header links */
.header1 a {
  float: left;
  color: white;
  text-align: center;
  padding: 6px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header1 a.logo1 {
  font-size: 25px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
.header1 a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active/current link*/
.header1 a.active {
  background-color: dodgerblue;
  color: white;
}

/* Float the link section to the right */
.header1-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header1 a {
    float: none;
    display: block;
    text-align: left;
  }
  .header1-right {
    float: none;
  }
}
	</style>
<div class="brand clearfix">
<div class="header1">
  <a href="#default" class="logo1">Meddrive Admin</a>
  <div class="header-right">
    
  </div>
</div>
</div>
