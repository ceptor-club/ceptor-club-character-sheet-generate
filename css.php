<style>
 		body {
  			background-color: black;
  			color: yellow;
  			font-family: 'Press Start 2P', cursive;
  			margin: 1em;
  			padding: 1em;
  			line-height: 1em;
  			font-size:1.25em;
		}
		h1, h2 {
			text-align: center;
			line-height: 2em;
		}
		#character-name{
			margin: 2em;
		}
		h3 {
			line-height: 2em;
		}
		.button{
  			background-color: yellow;
			border: none;
			color: black;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			float: left;
			font-size: 16px;
			margin: 1em;
			font-family: 'Press Start 2P', cursive;
  		} 		
		input, select, textarea {
			font-family: 'Press Start 2P', cursive;
			font-size: 100%;
			padding: 2em;
			margin: 1em;
		}
		input[type="radio"]:checked+label {
			border: 3px solid yellow;
			padding: .5em;
		}
		input[type='radio'] { 
			opacity: 0;
			margin:.25em;
 		}
 		
 		label {
			width: auto;
		}
  		.gen-field{
  			display: flex;
  			flex-wrap: wrap;
  			margin: 2em;
  			flex-direction: column;
  		}
  		.invisible{
  			opacity: 0;
  			visibility:hidden;
  			transition:visibility 0.3s linear,opacity 0.3s linear;
  			max-height: 0;
  		}
  		.visible{
  			opacity: 1;
  			visibility:visible;
  			transition:visibility 0.3s linear,opacity 0.3s linear;
  			max-height: 5000px;
  		}
  		.attributes{
  			display: flex;
  			flex-wrap: wrap;
  			margin: 1em;
  		}
		#pLevel-div{
			max-width: 30%;
			margin: 2em;
			display: inline-flex;
		}
		#pGender-div{
			max-width: 40%;
			margin: 2em;
			display: inline-flex;
		}
		#next-button-div{
			position: fixed;
			bottom: 0;
			right: 0;
		}
		#Character-Description{
			margin: 1em;
			line-height: 1.5em;
			margin-bottom: 2em;
		}
		.attributes{
			font-size: .7em;
			line-height: .8em;
		}
		
		/* New CSS */
		#walletNum{
			font-size: .25em;
			text-align: right;
		}
		@media only screen and (max-width: 600px) {
			body {
				font-size:.8em;
			}
			.attributes{
				font-size: .5em;
				line-height: 1.75em;
			}
			input, select, textarea {
				max-width: 90%;
				font-size: 80%;
			}
			h1, h2, h3  {
				line-height: 1.2em;
			}
			#character-name{
				margin: .5em;
			}
			#pGender-div{
				max-width: 90%;
			}
		}
	</style>