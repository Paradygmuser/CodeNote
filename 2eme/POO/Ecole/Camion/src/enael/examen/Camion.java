package enael.examen;

import java.util.Objects;
import java.util.TreeSet;

public class Camion {
	private Double volumeMax;
	private Double volumePris = 0.0;
	private int poidMax ; 
	private int poidPris = 0;
	private String plaque;
	private TreeSet<Materiel> chargablesCollection = new TreeSet<Materiel>();
	
	public Camion(String plaque, int poid, Double volume) {
		this.plaque=plaque;
		this.poidMax=poid;
		this.volumeMax=volume;
	}
	
	public void charger(Materiel...chargeables) throws MaxVolumeReachedException, MaxWeightReachedException {
		for(Materiel chargable : chargeables) {
			if(chargable.getVolume()+volumePris>volumeMax ) {
				throw new MaxVolumeReachedException("CHARGEMENT NON PERMIS=VoLUME DEPASSER , id.chargable : "+chargable.getIdentifiant());
			}
			else if(chargable.getPoid()+poidPris>poidMax) {
				throw new MaxWeightReachedException("CHARGEMENT NON PERMIS=POiD DEPASSER, id.chargable : "+chargable.getIdentifiant());
			}
			else {
				chargablesCollection.add(chargable);
				volumePris+=chargable.getVolume();
				poidPris+=chargable.getPoid();			
			}			
		}
	}
	
	public void decharger(Materiel...chargables) {
		for(Materiel chargable : chargables) {
			if(chargablesCollection.contains(chargable)) {
				chargablesCollection.remove(chargable);
			}			
		}
	}

	public Double getVolumeMax() {
		return volumeMax;
	}

	public Double getVolumePris() {
		return volumePris;
	}

	public int getPoidMax() {
		return poidMax;
	}

	public int getPoidPris() {
		return poidPris;
	}

	public String getPlaque() {
		return plaque;
	}

	public void setPoidMax(int poidMax) {
		this.poidMax = poidMax;
	}

	public TreeSet<Materiel> getChargables() {
		return chargablesCollection;
	}

	@Override
	public int hashCode() {
		return Objects.hash(chargablesCollection, plaque);
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Camion other = (Camion) obj;
		return Objects.equals(chargablesCollection, other.chargablesCollection) && Objects.equals(plaque, other.plaque);
	}
}
