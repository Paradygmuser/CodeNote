package enael.examen;

import java.util.Comparator;

public class ChargableVolumeComparator implements Comparator<Materiel> {

	@Override
	public int compare(Materiel o1, Materiel o2) {
		// TODO Auto-generated method stub
		if(o1.getVolume().equals(o2.getVolume())) {
			if(o1.getPoid()==o2.getPoid()) {
				return o1.getIdentifiant().compareTo(o2.getIdentifiant());
			}
			else {
				return o1.getPoid()-(o2.getPoid());				
			}
		}
		else {
			return o1.getVolume().compareTo(o2.getVolume());
		}
	}

}
