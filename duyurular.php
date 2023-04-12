<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from duyurular"));
$limit            	= 9;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a class='page-numbers' href='duyurular.html'>İlk</a>";
        $sayfalamaYaz.= "<a href='duyurular-$onceki.html' class='next page-numbers'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='page-numbers'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='duyurular-$i.html' class='page-numbers'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='duyurular-$sonraki.html' class='next page-numbers'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='duyurular-$sayfa_sayisi.html' class='next page-numbers'>Son</a>";

    }              
?>
	<div class="wrapper">
		<div id="content" role="main">
			<!-- Heading _______________________________________________--->
			<h1>Duyurular</h1>	
			
			<!-- Breadcrumbs _______________________________________________-->
			<p itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" id="breadcrumbs"><a href="/" rel="home" itemprop="url"><span itemprop="title">Anasayfa</span></a> <i class="icon-chevron-right"></i>Duyurular</p>
			<hr />

			<?php
			$duyurucekim	=mysql_query("select * from duyurular order by id desc LIMIT $goster,$limit");
				while($duycek=mysql_fetch_array($duyurucekim)){
				$duybaslik	=$duycek["duyuru_baslik"];
				$duyurukisa	=$duycek["duyuru_kisa"];
				$duyurutarih=$duycek["tarih"];
				$duyid		=$duycek["id"];
			?>
			<!-- Standard post excerpt _______________________________________________-->
			<article id="post-1" class="post format-standard sticky">

				<header class="entry-header">
					<!-- Post Featured Image _______________________________________________-->
					<div class="post-thumb">
						<a href="blog-post.html"></a>	
					</div>
								
					<!-- Meta info _______________________________________________-->
					<div class="entry-byline">
						<ul>
							
							<li><strong><i class="icon-calendar" title="Duyuru Tarih"></i></strong> <abbr class="published" title="<?=$duyurutarih;?>"><?=$duyurutarih;?></abbr></li>
							
						</ul>
					</div><!-- END .entry-byline -->
				
				</header> <!-- END .entry-header -->

				<div class="entry-summary">
					<!-- Heading _______________________________________________-->
					<h1><a href="duyurugoster-<?=$duyid;?>.html"><?=$duybaslik;?></a></h1>
				
					<!-- Excerpt  _______________________________________________-->
					<p><?=$duyurukisa;?></p>
					
					<!-- Footer meta info _______________________________________________-->
					<footer class="entry-footer">	
					</footer><!-- END .entry-footer -->
				</div><!-- END .entry-summary -->
				<div class="clear"></div>
			</article>
		<?php
		}
		?>
			
			<!-- Pagination _______________________________________________-->
			<div class="pagination loop-pagination">
				<?php echo $sayfalamaYaz;?>
			</div> <!-- END .pagination -->
		</div> <!-- END #content -->
		</div>