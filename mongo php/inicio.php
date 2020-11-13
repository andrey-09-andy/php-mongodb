  </div>
			<table class="table">
				
				<?php
					require 'config.php';
					$Mahasiswa = $collection->find();
					foreach ($Mahasiswa as $mhs) {
						echo "<tr>";
						//echo "<th scope='row'>".$mhs->id."</th>";

						//<a href="index.php" class="btn btn-info">Inicio</a>
                        echo "
                        <section class='Faq-answers'>
                        <article class='Faq-answers-item'>
                    
                    <div class='Faq-answers-item-answer Cms-content'>
                        <div class='Markdown-content'>
                        $mhs->titulo
                        </div>
                               
                    </article>  
                      <div class='center'>
                      <a href = 'respuesta.php?id=".$mhs->_id."'><dw-button>Aportar una respuesta</dw-button></a>  $mhs->fecha
                        
                      </div>
                      <hr class='colorgraph'>
                      </div>
                    </section>
                    ";
                       
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
