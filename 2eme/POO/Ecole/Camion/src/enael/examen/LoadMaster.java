package enael.examen;

import java.util.TreeSet;

public class LoadMaster {
	private static volatile LoadMaster instance;
	
	private LoadMaster() {
		
	}
	public static LoadMaster getInstance() {
		if(instance==null) {
			synchronized(LoadMaster.class) {
				if(instance==null) {
					instance=new LoadMaster();
				}
			}
		}
		return instance;
	}
	/**
	 * 
	 * @param camion
	 * @param chargables sont CAPABLE DE = interface permettant de faire heriter les comportement commun au chargables, la classe 
	 * @class Materiel me permet d'overider en une fois les attribut héritable.. car un vrac EST un materiel. ainsi une nouveaux mateirel peut avoir ca classe avec c'est particularité. cette classe m'evite egalement d'ovverider par nouveaux mateiriel creer les methode d'interface et comparable.
	 */
	public void charger(Camion camion, Materiel...chargables) {
			try {
				camion.charger(chargables);
				for(Chargeable chargable : chargables) {
					System.out.println("materiel charger : "+chargable.getIdentifiant()+" "+String.format("%.2f", chargable.getVolume())+" m3");
				}
			} catch (MaxVolumeReachedException e) {
				System.err.println(e.getMessage());
			} catch (MaxWeightReachedException e) {
				System.err.println(e.getMessage());
			}
		
	}
	public void decharger(Camion camion, Materiel...chargables) {
		camion.decharger(chargables);
	}
	
	public void afficherPoidCharger(Camion camion) {
		System.out.println(camion.getPoidPris());
	}
	/**
	 * String.format method statique de string permettant d'afficher a deux decimal pret.
	 * @param camion
	 */
	public void afficherVolumeCharger(Camion camion) {
		System.out.println(String.format("%.2f",camion.getVolumePris()));
	}
	
	public void afficherChargementParID(Camion...camions) {
		for(Camion camion : camions) {
			for(Chargeable chargable: camion.getChargables()) {
				System.out.println("ID : "+chargable.getIdentifiant()+", POID : "+chargable.getPoid()+" kg, VOLUME : "+String.format("%.2f", chargable.getVolume()));
			}
		}
	}
	
	public void afficherChargementParVolume(Camion...camions) {
		TreeSet<Materiel> nvxSet = new TreeSet<Materiel>(new ChargableVolumeComparator());
		
		for(Camion camion : camions) {
			nvxSet.addAll(camion.getChargables());
			for(Chargeable chargable: nvxSet) {
				System.out.println("ID : "+chargable.getIdentifiant()+", POID : "+chargable.getPoid()+" kg, VOLUME : "+String.format("%.2f", chargable.getVolume()));
			}
		}
	}
	
	public void afficherChargementParPoid(Camion...camions) {
		TreeSet<Materiel> nvxSet = new TreeSet<Materiel>(new ChargablePoidComparator());
		
		for(Camion camion : camions) {
			nvxSet.clear();
			nvxSet.addAll(camion.getChargables());
			for(Chargeable chargable: nvxSet) {
				System.out.println("ID : "+chargable.getIdentifiant()+", POID : "+chargable.getPoid()+" kg, VOLUME : "+String.format("%.2f", chargable.getVolume()));
			}
		}
	}
	
	
}
